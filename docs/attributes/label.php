<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Label</h2>
<div id="accordion">
    <div>
        <h3><a href="#">baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave the baseCls x-panel and use componentCls to add specific styling for this component.
<br /><br />
Defaults to: "x-component"
		</div>
    </div>
    <div>
        <h3><a href="#">border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#">cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
<br /><br />
Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#">disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the component.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">height: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The height of this component in pixels.</div>
    </div>
    <div>
        <h3><a href="#">hidden: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to hide the component.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#">padding: <strong class="stitulo">Number/String  </strong></a></h3>
        <div class="barra">Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#">style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles.
	</div>
    </div>
	<div>
        <h3><a href="#">text: <strong class="stitulo">String</strong></a></h3>
        <div class="barra">The plain text to display within the label. If you need to include HTML tags within the label's innerHTML, use the html config instead.
Defaults to: ""</div>
    </div>        
    <div>
        <h3><a href="#">tpl: <strong class="stitulo"> Ext.XTemplate/Ext.Template/String/String[] </strong></a></h3>
        <div class="barra">An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations.</div>
    </div>
    <div>
        <h3><a href="#">width: <strong class="stitulo">Number</strong></a></h3>
        <div class="barra">The width of this component in pixels.</div>
    </div>
</div>