<?php 
include("principal.html");
?>

<style>

.tst{
	overflow: auto; 
	position: relative; 
	height: 100px;
}
</style> 
    
<h2 class="demoHeaders">Teste</h2>
<div id="accordion">
<div>
	<div>
        <h3><a href="#"> activeError: <strong class="stitulo"> String </strong></a></h3>
        <div>If specified, then the component will be displayed with this value as its active error when first rendered. Use setActiveError or unsetActiveError to        change it after component creation.</div>
    </div>
</div>  
  
<div>  
    <div>
        <h3><a href="#"> anchor: <strong class="stitulo">  </strong></a></h3>
        <div></div>
    </div>
</div>

<div >        
    <div >
        <h3><a href="#"> layout: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="tst">
        <b>Important:</b> In order for child items to be correctly sized and positioned, typically a layout manager <b>must</b> be specified through the layout        configuration option.
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
        layout: { <br />
        type: 'vbox', <br />
        align: 'left' <br />
        }
        <br /><br />
        <br />
        <b>&bull; type</b>
        <br /><br />
        The layout type to be used for this container. If not specified, a default Ext.layout.container.Auto will be created and used.
        <br /><br />
        Valid layout type values are: <br />
        &bull; Auto    <b> Default</b> <br />
        &bull; card <br />
        &bull; fit <br />
        &bull; hbox <br />
        &bull; vbox <br />
        &bull; anchor <br />
        &bull; table <br />
        &bull; Layout specific configuration properties
        <br /><br />
        Additional layout specific configuration properties may also be specified. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the type specified.
        &bull; Specify as a String <br />
        &bull; Example usage:
        <br /><br />
        layout: 'vbox'
        <br /><br /><br />
        
        <b>&bull; layout</b>
        <br /><br />
        The layout type to be used for this container (see list of valid layout type values above).
        <br /><br />
        Additional layout specific configuration properties. For complete details regarding the valid config options for each layout type, see the layout class corresponding to the layout specified.
        </div>
    </div>
</div>

<div>     
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div>The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a        class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave        the baseCls x-panel and use componentCls to add specific styling for this component.
        <br /><br />
        Defaults to: "x-component"</div>
    </div>
</div>
    
<div >         
    <div>
        <h3><a href="#"> border: <strong class="stitulo"> Number/String </strong></a></h3>
        <div>Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div>
</div> 
   
</div>