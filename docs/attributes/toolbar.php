<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Toolbar</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave the baseCls x-panel and use componentCls to add specific styling for this component.
        <br /><br />
        Defaults to: "x-component" </div>
    </div> 
    <div>
        <h3><a href="#"> cls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
        <br /><br />
        Defaults to: "" </div>
    </div> 
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to disable the component.
        <br /><br />
        Defaults to: false </div>
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
        <h3><a href="#"> listeners: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra"> A config object containing one or more event handlers to be added to this object during initialization. This should be a valid listeners config object as specified in the addListener example for attaching multiple handlers at once.
        <br /><br />
        <b>DOM events from Ext JS Components</b>
        <br /><br />
        While some Ext JS Component classes export selected DOM events (e.g. "click", "mouseover" etc), this is usually only done when extra value can be added. For example the DataView's itemclick event passing the node clicked on. To access DOM events directly from a child element of a Component, we need to specify the element option to identify the Component property to add a DOM listener. </div>
    </div> 
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div> 
    <div>
        <h3><a href="#"> padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra"> Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'. </div>
    </div> 
    <div>
        <h3><a href="#"> style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles. </div>
    </div> 
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The width of this component in pixels. </div>
    </div> 
</div>