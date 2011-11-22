<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">FieldContainer</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> activeError: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">If specified, then the component will be displayed with this value as its active error when first rendered. Use setActiveError or unsetActiveError to         change it after component creation.</div>
    </div>
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a         class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you         leave the baseCls x-panel and use componentCls to add specific styling for this component.
        <br /><br />
        Defaults to: "x-component"</div>
    </div>
    <div>
        <h3><a href="#"> border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each         style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> clearCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The CSS class to be applied to the special clearing div rendered directly after the field contents wrapper to provide field clearing.
        <br /><br />
        Defaults to: "x-clear"</div>
    </div>
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of         its children using standard CSS rules.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the component.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> fieldLabel: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The label for the field. It gets appended with the labelSeparator, and its position and sizing is determined by the labelAlign, labelWidth, and         labelPad configs.</div>
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
        <div class="barra">An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the         document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is         appended.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> items: <strong class="stitulo"> Object/Object[] </strong></a></h3>
        <div class="barra">A single item, or an array of child Components to be added to this container
		<br /><br />
        <b>Unless configured with a layout, a Container simply renders child Components serially into its encapsulating element and performs no sizing or positioning upon them.</b>
        <br /><br />
        Each item may be:
        <br /><br />
        &bull; A Component<br />
        &bull; A Component configuration object
        <br /><br />
        If a configuration object is specified, the actual type of Component to be instantiated my be indicated by using the xtype option.
        <br /><br />
        Every Component class has its own xtype.
        <br /><br />
        If an xtype is not explicitly specified, the defaultType for the Container is used, which by default is usually panel.
        <br /><br />
        <b>Notes:</b>
        <br />
        Ext uses lazy rendering. Child Components will only be rendered should it become necessary. Items are automatically laid out when they are first shown (no sizing is done while hidden), or in response to a doLayout call.
        <br />
        Do not specify contentEl or html with items.</div>
    </div>
    <div>
        <h3><a href="#"> labelWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of the fieldLabel in pixels. Only applicable if the labelAlign is set to "left" or "right".
        <br /><br />
        Defaults to: 100</div>
    </div>
    <div>
        <h3><a href="#"> layout: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra"><b>Important:</b> In order for child items to be correctly sized and positioned, typically a layout manager <b>must</b> be specified through the layout configuration option.
        <br /><br />
        The sizing and positioning of child items is the responsibility of the Container's layout manager which creates and manages the type of layout you have in mind. For example:
        <br /><br />
        If the layout configuration is not explicitly specified for a general purpose container (e.g. Container or Panel) the default layout manager will be used which does nothing but render child components sequentially into the Container (no sizing or positioning will be performed in this situation).
        <br /><br />
        <b>layout</b> may be specified as either as an Object or as a String:
        <br /><br />
        &bull; Specify as an Object <br />
        &bull; Example usage:
        <br /><br />
        layout: {<br />
        type: 'vbox',<br />
        align: 'left'<br />
        }
        <br /><br />
        &bull; type
        <br />
        The layout type to be used for this container. If not specified, a default Ext.layout.container.Auto will be created and used.
        <br /><br />
        Valid layout type values are: <br /> 
        &bull; Auto     <b>Default</b> <br />
        &bull; card <br />
        &bull; fit <br />
        &bull; hbox <br />
        &bull; vbox <br />
        &bull; anchor <br />
        &bull; table <br />
        &bull; Layout specific configuration properties 
        <br /><br />
        Additional layout specific configuration properties may also be specified. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the type specified.
        <br /><br />
        &bull; Specify as a String <br />
        &bull; Example usage: <br />
        layout: 'vbox' 
        <br /><br />
        <b>&bull; layout</b>
        <br />
        The layout type to be used for this container (see list of valid layout type values above).
        <br />
        Additional layout specific configuration properties. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the layout specified.
        </div>
    </div>
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for         each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles.</div>
    </div>
    <div>
        <h3><a href="#"> tpl: <strong class="stitulo"> Ext.XTemplate/Ext.Template/String/String[] </strong></a></h3>
        <div class="barra">An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations.</div>
    </div>
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of this component in pixels.</div>
    </div>
</div>