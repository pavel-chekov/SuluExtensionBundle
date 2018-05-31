
/*
 * This file is part of ChekovExtensionBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require.config({
    paths: {
        chekovextension: '../../chekovextension/js',
        chekovextensioncss: '../../chekovextension/css'
    }
});

define(['css!chekovextensioncss/main'], function() {
    return {
        name: "ChekovExtensionBundle",

        initialize: function(app) {
            'use strict';
            var sandbox = app.sandbox;

            app.components.addSource('chekovextension', '/bundles/chekovextension/js/components');
        }
    }
});
