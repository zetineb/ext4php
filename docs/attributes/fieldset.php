<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">FieldSet</h2>
<div id="accordion">
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class applied to the fieldset.
        <br /><br />
        Defaults to: "x-fieldset"</div>
    </div>
    <div>
        <h3><a href="#"> border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each         style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of        its children using standard CSS rules.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> collapsed: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Set to true to render the fieldset as collapsed by default. If checkboxToggle is specified, the checkbox will also be unchecked by default.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> collapsible: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Set to true to make the fieldset collapsible and have the expand/collapse toggle button automatically rendered into the legend element, false to keep        the fieldset statically sized with no collapse button. Another option is to configure checkboxToggle. Use the collapsed config to collapse the fieldset by        default.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> defaults: <strong class="stitulo"> Object/Function </strong></a></h3>
        <div class="barra">This option is a means of applying default settings to all added items whether added through the items config or via the add or insert methods.
        <br /><br />
        Defaults are applied to both config objects and instantiated components conditionally so as not to override existing properties in the item (see         Ext.applyIf).
        <br /><br />
        If the defaults option is specified as a function, then the function will be called using this Container as the scope (this reference) and passing the added         item as the first parameter. Any resulting object from that call is then applied to the item as default properties.</div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the component.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> height: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The height of this component in pixels.</div>
    </div>
    <div>
        <h3><a href="#"> hidden: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to hide the component.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> html: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra">An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the         document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is        appended.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> items: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra">A single item, or an array of child Components to be added to this container
        <br /><br />
        <b>Unless configured with a layout, a Container simply renders child Components serially into its encapsulating element and performs no sizing or positioning upon them.</b>
        <br /><br />
        Example:
        <br /><br />
        // specifying a single item <br />
        items: {...}, <br />
        layout: 'fit',    // The single items is sized to fit
        <br /><br />
        // specifying multiple items <br />
        items: [{...}, {...}], <br />
        layout: 'hbox', // The items are arranged horizontally
        <br /><br /><br />
        Each item may be:
        <br /><br />
        &bull; A Component <br />
        &bull; A Component configuration object 
        <br /><br />
        If a configuration object is specified, the actual type of Component to be instantiated my be indicated by using the xtype option.
        <br /><br />
        Every Component class has its own xtype.
        <br /><br />
        If an xtype is not explicitly specified, the defaultType for the Container is used, which by default is usually panel.
        <br /><br /><br />
        <b>Notes:</b>
        <br /><br />
        Ext uses lazy rendering. Child Components will only be rendered should it become necessary. Items are automatically laid out when they are first shown (no sizing is done while hidden), or in response to a doLayout call.
        <br /><br />
        Do not specify contentEl or html with items.</div>
    </div>
    <div>
        <h3><a href="#"> layout: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The Ext.container.Container.layout for the fieldset's immediate child items.
        <br /><br />
        Defaults to: "anchor"</div>
    </div>
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for        each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> readOnly: <strong class="stitulo">  </strong></a></h3>
        <div class="barra"></div>
    </div>
    <div>
        <h3><a href="#"> style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles.</div>
    </div>
    <div>
        <h3><a href="#"> title: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">A title to be displayed in the fieldset's legend. May contain HTML markup.</div>
    </div>
    <div>
        <h3><a href="#"> tpl: <strong class="stitulo">Ext.XTemplate/Ext.Template/String/String[]</strong></a></h3>
        <div class="barra">An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations.</div>
    </div>
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of this component in pixels.</div>
    </div>
</div>






