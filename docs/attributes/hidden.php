<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Hidden</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> activeError: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">If specified, then the component will be displayed with this value as its active error when first rendered. Use setActiveError or unsetActiveError to        change it after component creation.</div>
    </div>
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a 	        class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave        the baseCls x-panel and use componentCls to add specific styling for this component.
        <br /><br />
		Defaults to: "x-component"</div>
    </div> 
    <div>
        <h3><a href="#"> border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div> 
    <div>
        <h3><a href="#"> clearCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The CSS class to be applied to the special clearing div rendered directly after the field contents wrapper to provide field clearing.
        <br /><br />
        Defaults to: "x-clear"</div>
    </div>
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of        its children using standard CSS rules.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the field. Disabled Fields will not be <b>submitted.</b>
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> fieldLabel: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The label for the field. It gets appended with the labelSeparator, and its position and sizing is determined by the labelAlign, labelWidth, and        labelPad configs.</div>
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
        <div class="barra">An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the        document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is        appended.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> name: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The name of the field. This is used as the parameter name when including the field value in a form submit(). If no name is configured, it falls back to        the inputId. To prevent the field from being included in the form submit, set submitValue to false.</div>
    </div>
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for        each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> readOnly: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to mark the field as readOnly in HTML.
		<br /><br />
		<b>Note:</b> this only sets the element's readOnly DOM attribute. Setting readOnly=true, for example, will not disable triggering a ComboBox or Date; it        gives you the option of forcing the user to choose via the trigger without typing in the text box. To hide the trigger use hideTrigger.
		<br /><br />
		Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles.</div>
    </div>
    <div>
        <h3><a href="#"> tabIndex: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The tabIndex for this field. Note this only applies to fields that are rendered, not those which are built via applyTo</div>
    </div>
    <div>
        <h3><a href="#"> tpl: <strong class="stitulo"> Ext.XTemplate/Ext.Template/String/String[] </strong></a></h3>
        <div class="barra">An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations.</div>
    </div>
    <div>
        <h3><a href="#"> value: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra">A value to initialize this field with.</div>
    </div>
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of this component in pixels.</div>
    </div>
</div>