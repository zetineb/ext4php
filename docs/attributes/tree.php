<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Tree</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> activeItem: <strong class="stitulo"> String/Number </strong></a></h3>
        <div class="barra"> A string component id or the numeric index of the component that should be initially activated within the container's layout on render. For example, activeItem: 'item-1' or activeItem: 0 (index 0 = the first item in the container's collection). activeItem only applies to layout styles that can display items one at a time (like Ext.layout.container.Card and Ext.layout.container.Fit). </div>
    </div>  
    <div>
        <h3><a href="#"> animate: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to enable animated expand/collapse. Defaults to the value of Ext.enableFx. </div>
    </div>
    <div>
        <h3><a href="#"> autoScroll: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to use overflow:'auto' on the components layout element and show scroll bars automatically when necessary, false to clip any overflowing content.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> autoShow: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to automatically show the component upon creation. This config option may only be used for floating components or components that use autoRender. Defaults to false.
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
        <div class="barra"> Convenience config used for adding buttons docked to the bottom of the panel. </div>
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
        <h3><a href="#"> closeAction: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The action to take when the close header tool is clicked:
        <br /><br />
        <b>&bull; 'destroy' :</b>
        <br /><br />
        remove the window from the DOM and destroy it and all descendant Components. The window will <b>not</b> be available to be redisplayed via the show method.
        <b>&bull; 'hide' :</b>
        <br /><br />
        hide the window by setting visibility to hidden and applying negative offsets. The window will be available to be redisplayed via the show method.
        <br /><br />
        <b>Note:</b> This behavior has changed! setting does affect the close method which will invoke the approriate closeAction.
        <br /><br />
        Defaults to: "destroy" </div>
    </div>
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
        <br /><br />
        Defaults to: "" </div>
    </div>
	<div>
        <h3><a href="#"> collapseDirection: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> The direction to collapse the Panel when the toggle button is clicked.
        <br /><br />
        Defaults to the headerPosition
        <br /><br />
        <b>Important: This config is ignored for collapsible Panels which are direct child items of a border layout.</b>
        <br /><br />
        Specify as 'top', 'bottom', 'left' or 'right'. </div>
    </div>
    <div>
        <h3><a href="#"> collapseFirst: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to make sure the collapse/expand toggle button always renders first (to the left of) any other tools in the panel's title bar, false to render it last.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> collapseMode: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> <b>Important: this config is only effective for collapsible Panels which are direct child items of a border layout.</b>
        <br /><br />
        When not a direct child item of a border layout, then the Panel's header remains visible, and the body is collapsed to zero dimensions. If the Panel has no header, then a new header (orientated correctly depending on the collapseDirection) will be inserted to show a the title and a re- expand tool.
        <br /><br />
        When a child item of a border layout, this config has two options:
        <br /><br />
        <b>&bull; undefined/omitted</b>
        <br /><br />
        When collapsed, a placeholder Header is injected into the layout to represent the Panel and to provide a UI with a Tool to allow the user to re-expand the Panel.
        <br />
        <b>&bull; header :</b>
        <br /><br />
        The Panel collapses to leave its header visible as when not inside a border layout. </div>
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
        <h3><a href="#"> columns: <strong class="stitulo"> Ext.grid.column.Column[] </strong></a></h3>
        <div class="barra"> An array of column definition objects which define all columns that appear in this grid. Each column definition provides the header text for the column, and a definition of where the data for that column comes from. </div>
    </div>
    <div>
        <h3><a href="#"> data: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra"> The initial set of data to apply to the tpl to update the content area of the Component. </div>
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
        <h3><a href="#"> deferRowRender: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> Defaults to true to enable deferred row rendering.
        <br /><br />
        This allows the View to execute a refresh quickly, with the expensive update of the row structure deferred so that layouts with GridPanels appear, and lay out more quickly.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to disable the component.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> displayField: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> The field inside the model that will be used as the node's text.
        <br /><br />
        Defaults to: "text" </div>
    </div>
    <div>
        <h3><a href="#"> enableColumnHide: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable column hiding within this grid.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> enableColumnMove: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable column dragging within this grid.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> enableColumnResize: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable column resizing within this grid.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> enableLocking: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to enable locking support for this grid. Alternatively, locking will also be automatically enabled if any of the columns in the column configuration contain the locked config option.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> fbar: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra"> Convenience config used for adding items to the bottom of the panel. </div>
    </div>
    <div>
        <h3><a href="#"> floatable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"><b> Important: This config is only effective for collapsible Panels which are direct child items of a border layout.</b>
        <br /><br />
        true to allow clicking a collapsed Panel's placeholder to display the Panel floated above the layout, false to force the user to fully expand a collapsed region by clicking the expand button to see it again.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> floating: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> Specify as true to float the Component outside of the document flow using CSS absolute positioning.
        <br /><br />
        Components such as Windows and Menus are floating by default.
        <br /><br />
        Floating Components that are programatically rendered will register themselves with the global ZIndexManager
        <br /><br /><br />
        <h4>Floating Components as child items of a Container</h4>
        A floating Component may be used as a child item of a Container. This just allows the floating Component to seek a ZIndexManager by examining the ownerCt chain.
        <br /><br />
        When configured as floating, Components acquire, at render time, a ZIndexManager which manages a stack of related floating Components. The ZIndexManager brings a single floating Component to the top of its stack when the Component's toFront method is called.
        <br /><br />
        The ZIndexManager is found by traversing up the ownerCt chain to find an ancestor which itself is floating. This is so that descendant floating Components of floating Containers (Such as a ComboBox dropdown within a Window) can have its zIndex managed relative to any siblings, but always above that floating ancestor Container.
        <br /><br />
        If no floating ancestor is found, a floating Component registers itself with the default ZIndexManager.
        <br /><br />
        Floating components do not participate in the Container's layout. Because of this, they are not rendered until you explicitly show them.
        <br /><br />
        After rendering, the ownerCt reference is deleted, and the floatParent property is set to the found floating ancestor Container. If no floating ancestor Container was found the floatParent property will not be set.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> focusOnToFront: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> Specifies whether the floated component should be automatically focused when it is brought to the front.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> folderSort: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to automatically prepend a leaf sorter to the store. Defaults to undefined. </div>
    </div>
    <div>
        <h3><a href="#"> forceFit: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> Ttrue to force the columns to fit into the available width. Headers are first sized according to configuration, whether that be a specific width, or flex. Then they are all proportionally changed in width so that the entire content width is used. </div>
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
        <h3><a href="#"> hideCollapseTool: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> true to hide the expand/collapse toggle button when collapsible == true, false to display it.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> hideHeaders: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to hide the headers. Defaults to undefined. </div>
    </div>
    <div>
        <h3><a href="#"> hideMode: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">  A String which specifies how this Component's encapsulating DOM element will be hidden. Values may be:
        <br /><br />
        <b>&bull; 'display' :</b> The Component will be hidden using the display: none style.
        <br />
        <b>&bull; 'visibility' :</b> The Component will be hidden using the visibility: hidden style.
        <br />
        <b>&bull; 'offsets' :</b> The Component will be hidden by absolutely positioning it out of the visible area of the document. This is useful when a hidden Component must maintain measurable dimensions. Hiding using display results in a Component having zero dimensions.
        <br /><br />
        Defaults to: "display"</div>
    </div>
    <div>
        <h3><a href="#"> html: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra"> An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is appended.
        <br /><br />
        Defaults to: "" </div>
    </div>
    <div>
        <h3><a href="#"> iconCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> CSS class for icon in header. Used for displaying an icon to the left of a title. </div>
    </div>
    <div>
        <h3><a href="#"> itemId: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> An itemId can be used as an alternative way to get a reference to a component when no object reference is available. Instead of using an id with Ext.getCmp, use itemId with Ext.container.Container.getComponent which will retrieve itemId's or id's. Since itemId's are an index to the container's internal MixedCollection, the itemId is scoped locally to the container -- avoiding potential conflicts with Ext.ComponentManager which requires a <b>unique</b> id.        <br /><br />
        Also see id, Ext.container.Container.query, Ext.container.Container.down and Ext.container.Container.child.
        <br /><br />
        <b>Note:</b> to access the container of an item see ownerCt.</div>
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
        <i><b>&bull; Specify as an Object </b></i>
        &bull; type
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
        &bull; Layout specific configuration properties
        <br /><br />
        Additional layout specific configuration properties may also be specified. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the type specified.
        <br /><br />
        <i><b>&bull; Specify as a String</b></i>
        <br /><br />
        &bull; Example usage:
        <br /><br />
        layout: 'vbox'
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
        <h3><a href="#"> lines: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable tree lines.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> listeners: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra"> A config object containing one or more event handlers to be added to this object during initialization. This should be a valid listeners config object as specified in the addListener example for attaching multiple handlers at once.
        <br /><br />
        <b>DOM events from Ext JS Components</b>
        <br /><br />
        While some Ext JS Component classes export selected DOM events (e.g. "click", "mouseover" etc), this is usually only done when extra value can be added. For example the DataView's itemclick event passing the node clicked on. To access DOM events directly from a child element of a Component, we need to specify the element option to identify the Component property to add a DOM listener to. </div>
    </div>
    <div>
        <h3><a href="#"> maintainFlex: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> <b>Only valid when a sibling element of a Splitter within a VBox or HBox layout.</b>
        <br /><br />
        Specifies that if an immediate sibling Splitter is moved, the Component on the other side is resized, and this Component maintains its configured flex value.
        <br /><br />
        Defaults to: false </div>
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
        <h3><a href="#"> minButtonWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> Minimum width of all footer toolbar buttons in pixels. If set, this will be used as the default value for the Ext.button.Button.minWidth config of each Button added to the footer toolbar via the fbar or buttons configurations. It will be ignored for buttons that have a minWidth configured some other way, e.g. in their own config object or via the defaults of their parent container.
        <br /><br />
        Defaults to: 75 </div>
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
        <h3><a href="#"> multiSelect: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to enable 'MULTI' selection mode on selection model. See Ext.selection.Model.mode. </div>
    </div>
    <div>
        <h3><a href="#"> overCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> An optional extra CSS class that will be added to this component's Element when the mouse moves over the Element, and removed when the mouse moves out. This can be useful for adding customized 'active' or 'hover' styles to the component or any of its children using standard CSS rules.
        <br /><br />
        Defaults to: "" </div>
    </div>
    <div>
        <h3><a href="#"> overlapHeader: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to overlap the header in a panel over the framing of the panel itself. This is needed when frame:true (and is done automatically for you). Otherwise it is undefined. If you manually add rounded corners to a panel header which does not have frame:true, this will need to be set to true. </div>
    </div>
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div>
    <div>
        <h3><a href="#"> preventHeader: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> Prevent a Header from being created and shown.
        <br /><br />
        Defaults to: false </div>
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
        <h3><a href="#"> root: <strong class="stitulo"> Ext.data.Model/Ext.data.NodeInterface/Object </strong></a></h3>
        <div class="barra"> Allows you to not specify a store on this TreePanel. This is useful for creating a simple tree with preloaded data without having to specify a TreeStore and Model. A store and model will be created and root will be passed to that store.
        <br /><br />
        Defaults to: null </div>
    </div>
    <div>
        <h3><a href="#"> rootVisible: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to hide the root node.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> saveDelay: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> A buffer to be applied if many state events are fired within a short period.
        <br /><br />
        Defaults to: 100 </div>
    </div>
    <div>
        <h3><a href="#"> scroll: <strong class="stitulo"> String/Boolean </strong></a></h3>
        <div class="barra"> Scrollers configuration. Valid values are 'both', 'horizontal' or 'vertical'. True implies 'both'. False implies 'none'.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> scrollDelta: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> Number of pixels to scroll when scrolling with mousewheel.
        <br /><br />
        Defaults to: 40 </div>
    </div>
    <div>
        <h3><a href="#"> shadow: <strong class="stitulo"> String/Boolean </strong></a></h3>
        <div class="barra"> Specifies whether the floating component should be given a shadow. Set to true to automatically create an Ext.Shadow, or a string indicating the shadow's display Ext.Shadow.mode. Set to false to disable the shadow.
        <br /><br />
        Defaults to: "sides" </div>
    </div>
    <div>
        <h3><a href="#"> simpleSelect: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to enable 'SIMPLE' selection mode on selection model. See Ext.selection.Model.mode. </div>
    </div>
    <div>
        <h3><a href="#"> singleExpand: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True if only 1 node per branch may be expanded.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> sortableColumns: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable column sorting via clicking the header and via the Sorting menu items.
        <br /><br />
        Defaults to: true </div>
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
        <h3><a href="#"> toFrontOnShow: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to automatically call toFront when the show method is called on an already visible, floating component.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> tools: <strong class="stitulo"> Object[]/Ext.panel.Tool[] </strong></a></h3>
        <div class="barra"> An array of Ext.panel.Tool configs/instances to be added to the header tool area. The tools are stored as child components of the header container. They can be accessed using down and {#query}, as well as the other component methods. The toggle tool is automatically created if collapsible is set to true.
        <br /><br />
        Note that, apart from the toggle tool which is provided when a panel is collapsible, these tools only provide the visual button. Any required functionality must be provided by adding handlers that implement the necessary behavior. </div>
    </div>
    <div>
        <h3><a href="#"> tpl: <strong class="stitulo"> Ext.XTemplate/Ext.Template/String/String[] </strong></a></h3>
        <div class="barra"> An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations. </div>
    </div>
    <div>
        <h3><a href="#"> useArrows: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to use Vista-style arrows in the tree.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The width of this component in pixels. </div>
    </div>
</div>