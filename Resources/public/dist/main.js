require.config({paths:{chekovevent:"../../chekovextension/dist",chekoveventcss:"../../chekovextension/css"}}),define(["css!chekovextensioncss/main"],function(){return{name:"ChekovExtensionBundle",initialize:function(a){"use strict";a.sandbox;a.components.addSource("chekovform","/bundles/chekovextension/dist/components")}}});