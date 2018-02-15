
/*
 * This file is part of ChekovEventBundle package.
 *
 * (c) Chekov Bundles <https://github.com/pavel-chekov>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require.config({
    paths: {
        chekovevent: '../../chekovextension/js',
        chekoveventcss: '../../chekovextension/css'
    }
});

define(['css!chekovextensioncss/main'], function() {
    return {
        name: "ChekovExtensionBundle",

        initialize: function(app) {
            'use strict';
            var sandbox = app.sandbox;

            app.components.addSource('chekovform', '/bundles/chekovextension/js/components');
        }
    }
});
