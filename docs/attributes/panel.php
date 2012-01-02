<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Panel</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> activeItem: <strong class="stitulo"> String/Number </strong></a></h3>
        <div class="barra"> A string component id or the numeric index of the component that should be initially activated within the container's layout on render. For example, activeItem: 'item-1' or activeItem: 0 (index 0 = the first item in the container's collection). activeItem only applies to layout styles that can display items one at a time (like Ext.layout.container.Card and Ext.layout.container.Fit). </div>
    </div> 
    <div>
        <h3><a href="#"> autoScroll: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to use overflow:'auto' on the components layout element and show scroll bars automatically when necessary, false to clip any overflowing content.
        <br /><br />
        Defaults to: false </div>
    </div> 
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The base CSS class to apply to this panel's element.
        <br /><br />
        Defaults to: "x-panel" </div>
    </div> 
    <div>
        <h3><a href="#"> bbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config. Short for 'Bottom Bar'. </div>
    </div> 
    <div>
        <h3><a href="#"> bodyBorder: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> A shortcut to add or remove the border on the body of a panel. This only applies to a panel which has the frame configuration set to true. </div>
    </div> 
    <div>
        <h3><a href="#"> bodyCls: <strong class="stitulo"> String/String[] </strong></a></h3>
        <div class="barra"> A CSS class, space-delimited string of classes, or array of classes to be applied to the panel's body element. </div>
    </div> 
    <div>
        <h3><a href="#"> bodyPadding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> A shortcut for setting a padding style on the body element. The value can either be a number to be applied to all sides, or a normal css string describing padding. </div>
    </div> 
    <div>
        <h3><a href="#"> bodyStyle: <strong class="stitulo"> String/Object/Function </strong></a></h3>
        <div class="barra"> Custom CSS styles to be applied to the panel's body element, which can be supplied as a valid CSS style string, an object containing style property name/value pairs or a function that returns such a string or object. </div>
    </div> 
    <div>
        <h3><a href="#"> border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div> 
    <div>
        <h3><a href="#"> buttonAlign: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The alignment of any buttons added to this panel. Valid values are 'right', 'left' and 'center' (defaults to 'right' for buttons/fbar, 'left' for other toolbar types).
        <br /><br />
        <b>NOTE:</b> The prefered way to specify toolbars is to use the dockedItems config. Instead of buttonAlign you would add the layout: { pack: 'start' | 'center' | 'end' } option to the dockedItem config. </div>
    </div> 
    <div>
        <h3><a href="#"> buttons: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config used for adding buttons docked to the bottom of the panel. This is a synonym for the fbar config. <br /><br />
        The minButtonWidth is used as the default minWidth for each of the buttons in the buttons toolbar. </div>
    </div> 
    <div>
        <h3><a href="#"> closable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to display the 'close' tool button and allow the user to close the window, false to hide the button and disallow closing the window.
        <br /><br />
        By default, when close is requested by clicking the close button in the header, the close method will be called. This will destroy the Panel and its content meaning that it may not be reused.
        <br /><br />
        To make closing a Panel hide the Panel so that it may be reused, set closeAction to 'hide'.
        <br /><br />
        Defaults to: false </div>
    </div> 
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
        <br /><br />
        Defaults to: "" </div>
    </div> 
    <div>
        <h3><a href="#"> collapsed: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to render the panel collapsed, false to render it expanded.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> collapsible: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to make the panel collapsible and have an expand/collapse toggle Tool added into the header tool button area. False to keep the panel sized either statically, or by an owning layout manager, with no toggle Tool.
        <br /><br />
        See collapseMode and collapseDirection
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> defaults: <strong class="stitulo"> Object/Function </strong></a></h3>
        <div class="barra"> This option is a means of applying default settings to all added items whether added through the items config or via the add or insert methods.
        <br /><br />
        Defaults are applied to both config objects and instantiated components conditionally so as not to override existing properties in the item (see Ext.applyIf).
        <br /><br />
        If the defaults option is specified as a function, then the function will be called using this Container as the scope (this reference) and passing the added item as the first parameter. Any resulting object from that call is then applied to the item as default properties.
        <br /><br />
        For example, to automatically apply padding to the body of each of a set of contained Ext.panel.Panel items, you could pass: defaults: {bodyStyle:'padding:15px'}.</div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to disable the component.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> fbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config used for adding items to the bottom of the panel. Short for Footer Bar.
        <br /><br />
        The minButtonWidth is used as the default minWidth for each of the buttons in the fbar. </div>
    </div>
    <div>
        <h3><a href="#"> frame: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to apply a frame to the panel.
        <br /><br />
        Defaults to: false </div>
    </div> 
    <div>
        <h3><a href="#"> frameHeader: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to apply a frame to the panel panels header (if 'frame' is true).
        <br /><br />
        Defaults to: true </div>
    </div> 
    <div>
        <h3><a href="#"> headerPosition: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> Specify as 'top', 'bottom', 'left' or 'right'.
        <br /><br />
        Defaults to: "top" </div>
    </div> 
    <div>
        <h3><a href="#"> height: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The height of this component in pixels. </div>
    </div> 
    <div>
        <h3><a href="#"> hidden: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to hide the component.
        <br /><br />
        Defaults to: false </div>
    </div> 
    <div>
        <h3><a href="#"> html: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra"> An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is appended.
        <br /><br />
        Defaults to: "" </div>
    </div> 
    <div>
        <h3><a href="#"> items: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> A single item, or an array of child Components to be added to this container
        <br /><br />
        <b>Unless configured with a layout, a Container simply renders child Components serially into its encapsulating element and performs no sizing or positioning upon them.</b>
        <br /><br />
        Each item may be:
        <br /><br />
        <b>* A Component</b> <br />
        <b>* A Component configuration object</b>
        <br /><br />
        If a configuration object is specified, the actual type of Component to be instantiated my be indicated by using the xtype option.
        <br /><br />
        Every Component class has its own xtype.
        <br /><br />
        If an xtype is not explicitly specified, the defaultType for the Container is used, which by default is usually panel.
        <br /><br />
        <b>Notes:</b>
        <br /><br />
        Ext uses lazy rendering. Child Components will only be rendered should it become necessary. Items are automatically laid out when they are first shown (no sizing is done while hidden), or in response to a doLayout call.
        <br /><br />
        Do not specify contentEl or html with items. </div>
    </div> 
    <div>
        <h3><a href="#"> layout: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra"> <b>Important:</b> In order for child items to be correctly sized and positioned, typically a layout manager must be specified through the layout configuration option.
        <br /><br />
        The sizing and positioning of child items is the responsibility of the Container's layout manager which creates and manages the type of layout you have in mind. For example:
        <br /><br />
        If the layout configuration is not explicitly specified for a general purpose container (e.g. Container or Panel) the default layout manager will be used which does nothing but render child components sequentially into the Container (no sizing or positioning will be performed in this situation).
        <br /><br />
        <b>layout</b> may be specified as either as an Object or as a String:
        <br /><br />
        <i><b>&bull; Specify as an Object</b></i>
        <br /><br />
        <b>&bull; type</b>
        <br /><br />
        The layout type to be used for this container. If not specified, a default Ext.layout.container.Auto will be created and used.
        <br /><br />
        Valid layout type values are:
        <br /><br />
        &bull; Auto     <b>Default</b> <br />
        &bull; card <br />
        &bull; fit <br />
        &bull; hbox <br />
        &bull; vbox <br />
        &bull; anchor <br />
        &bull; table
        <br /><br />
        &bull; Layout specific configuration properties <br />
        Additional layout specific configuration properties may also be specified. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the type specified.
        <br /><br />
        <i><b>&bull; Specify as a String</b></i>
        <br /><br />
        <b>&bull; layout</b>
        <br /><br />
        The layout type to be used for this container (see list of valid layout type values above).
        <br /><br />
        Additional layout specific configuration properties. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the layout specified.</div>
    </div> 
    <div>
        <h3><a href="#"> lbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config. Short for 'Left Bar' (left-docked, vertical toolbar). </div>
    </div> 
    <div>
        <h3><a href="#"> listeners: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra"> A config object containing one or more event handlers to be added to this object during initialization. This should be a valid listeners config object as specified in the addListener example for attaching multiple handlers at once.
        <br /><br />
        DOM events from Ext JS Components
        <br /><br />
        While some Ext JS Component classes export selected DOM events (e.g. "click", "mouseover" etc), this is usually only done when extra value can be added. For example the DataView's itemclick event passing the node clicked on. To access DOM events directly from a child element of a Component, we need to specify the element option to identify the Component property to add a DOM listener to. </div>
    </div> 
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div> 
    <div>
        <h3><a href="#"> maxHeight: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The maximum value in pixels which this Component will set its height to.
        <br /><br />
        <b>Warning:</b> This will override any size management applied by layout managers. </div>
    </div> 
    <div>
        <h3><a href="#"> maxWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The maximum value in pixels which this Component will set its width to.
        <br /><br />
        <b>Warning:</b> This will override any size management applied by layout managers. </div>
    </div> 
    <div>
        <h3><a href="#"> minHeight: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The minimum value in pixels which this Component will set its height to.
        <br /><br />
        <b>Warning:</b> This will override any size management applied by layout managers. </div>
    </div>
    <div>
        <h3><a href="#"> minWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The minimum value in pixels which this Component will set its width to.
        <br /><br />
        <b>Warning:</b> This will override any size management applied by layout managers. </div>
    </div>
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div>
    <div>
        <h3><a href="#"> rbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config. Short for 'Right Bar' (right-docked, vertical toolbar). </div>
    </div>
    <div>
        <h3><a href="#"> resizable: <strong class="stitulo"> Boolean/Object </strong></a></h3>
        <div class="barra"> Specify as true to apply a Resizer to this Component after rendering.
        <br /><br />
        May also be specified as a config object to be passed to the constructor of Resizer to override any defaults. By default the Component passes its minimum and maximum size, and uses Ext.resizer.Resizer.dynamic: false </div>
    </div> 
    <div>
        <h3><a href="#"> style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles. </div>
    </div> 
    <div>
        <h3><a href="#"> tbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config. Short for 'Top Bar'. </div>
    </div> 
    <div>
        <h3><a href="#"> title: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The title text to be used to display in the panel header. When a title is specified the Ext.panel.Header will automatically be created and displayed unless preventHeader is set to true.
        <br /><br />
        Defaults to: "" </div>
    </div> 
    <div>
        <h3><a href="#"> titleCollapse: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to allow expanding and collapsing the panel (when collapsible = true) by clicking anywhere in the header bar, false) to allow it only by clicking to tool butto).
        <br /><br />
        Defaults to: false </div>
    </div> 
    <div>
        <h3><a href="#"> tools: <strong class="stitulo"> Object[]/Ext.panel.Tool[] </strong></a></h3>
        <div class="barra"> An array of Ext.panel.Tool configs/instances to be added to the header tool area. The tools are stored as child components of the header container. They can be accessed using down and {#query}, as well as the other component methods. The toggle tool is automatically created if collapsible is set to true.
        <br /><br />
        Note that, apart from the toggle tool which is provided when a panel is collapsible, these tools only provide the visual button. Any required functionality must be provided by adding handlers that implement the necessary behavior. </div>
    </div> 
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The width of this component in pixels. </div>
    </div> 
</div>