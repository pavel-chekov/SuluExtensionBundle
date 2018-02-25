<?php

/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chekov\Bundle\ExtensionBundle\Controller;

use Chekov\Bundle\ExtensionBundle\Serializer\SerializerInterface;
use Chekov\Bundle\ExtensionBundle\Exception\NotFoundHttpException;
use Chekov\Bundle\ExtensionBundle\Repository\ExtensionRepositoryInterface;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use Sulu\Component\Rest\ListBuilder\ListRepresentation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EntityController
{
    /**
     * @var ExtensionRepositoryInterface
     */
    private $entityRepository;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ViewHandlerInterface
     */
    private $restViewHandler;

    /**
     * @var string
     */
    private $resourceName;

    public function __construct(
        ExtensionRepositoryInterface $entityRepository,
        SerializerInterface $serializer,
        ViewHandlerInterface $restViewHandler,
        $resourceName
    ) {
        $this->entityRepository = $entityRepository;
        $this->serializer = $serializer;
        $this->restViewHandler = $restViewHandler;
        $this->resourceName = $resourceName;
    }

    public function getAction(Request $request, $id)
    {
        $entity = $this->get($id, $request);

        if (!$entity) {
            throw new NotFoundHttpException($id, $this->resourceName);
        }

        return $this->createResponse($entity, 200);
    }

    public function cgetFieldsAction(Request $request)
    {

        throw new HttpException(501, 'Will be implemented soon');
    }

    public function cgetAction(Request $request)
    {
        $list = $this->getList($request);

        return $this->createListResponse($list, 200);
    }

    public function postAction(Request $request)
    {
        $entity = $this->create();
        $this->map($request, $entity);

        $this->entityRepository->persist($entity);
        $this->entityRepository->flush();

        return $this->createResponse($entity, 201);
    }

    public function putAction(Request $request, $id)
    {
        $entity = $this->get($id, $request);
        $this->map($request, $entity);

        $this->entityRepository->persist($entity);
        $this->entityRepository->flush();
    }

    public function deleteAction(Request $request, $id)
    {
        $this->remove($request, $id);

        return $this->createResponse(null, 204);
    }

    protected function map(Request $request, $entity)
    {
        $data = $this->getData($request);
        $this->serializer->deserialize($entity, $data);
    }

    protected function get(Request $request, $id)
    {
        return $this->entityRepository->get($id, $this->getFilters($request));
    }

    protected function getList(Request $request)
    {
        $filters = $this->getListFilters($request);

        throw new HttpException(501, 'Will be implemented soon');

        $list = null;
        $total = null;
        $page = null;
        $limit = null;

        $representation = new ListRepresentation(
            $list,
            $this->resourceName,
            $request->attributes->get('_route'),
            $request->query->all(),
            $page,
            $limit,
            $total
        );

        return $representation;
    }

    protected function create()
    {
        return $this->entityRepository->createNew();
    }

    protected function remove(Request $request, $id)
    {
        return $this->entityRepository->remove($id);
    }

    protected function getListFilters(Request $request)
    {
        return $this->getFilters($request);
    }

    protected function getFilters(Request $request)
    {
        return $request->query->all();
    }

    protected function getData(Request $request)
    {
        return $request->request->all();
    }

    protected function createResponse($entity, $statusCode = null)
    {
        return $this->handleView(
            $this->view(
                $entity ? $this->serializer->serialize($entity) : null,
                $statusCode
            )
        );
    }

    protected function createListResponse($list, $statusCode = null)
    {
        return $this->handleView(
            $this->view(
                $list,
                $statusCode
            )
        );
    }

    private function view($data = null, $statusCode = null, array $headers = [])
    {
        return View::create($data, $statusCode, $headers);
    }

    private function handleView(View $view)
    {
        return $this->restViewHandler->handle($view);
    }
}
