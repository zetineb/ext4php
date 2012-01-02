<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">HtmlEditor</h2>
<div id="accordion">
	<div>
        <h3><a href="#">onActivate </a></h3>
        <div class="barra">  Fires when the editor is first receives the focus. Any insertion must wait until after this event.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.form.field.HtmlEditor <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAdded</a></h3>
        <div class="barra"> Fires after a Component had been added to a Container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; container : Ext.container.Container
        <br /><br />
        Parent Container <br />
        &bull; pos : Number
        <br /><br />
        position of Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAfterRender</a></h3>
        <div class="barra"> Fires after the component rendering is finished.
        <br /><br />
        The afterrender event is fired after this Component has been rendered, been postprocesed by any afterRender method defined for the Component.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onBeforeActivate </a></h3>
        <div class="barra"> Fires before a Component has been visually activated. Returning false from an event listener can prevent the activate from occurring.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br/>
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onBeforeDeactivate </a></h3>
        <div class="barra"> Fires before a Component has been visually deactivated. Returning false from an event listener can prevent the deactivate from occurring.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeDestroy</a></h3>
        <div class="barra"> Fires before the component is destroyed. Return false from an event handler to stop the destroy.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeHide</a></h3>
        <div class="barra"> Fires before the component is hidden when calling the hide method. Return false from an event handler to stop the hide.
        <br /><br />
        Parameters
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeRender</a></h3>
        <div class="barra"> Fires before the component is rendered. Return false from an event handler to stop the render.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeShow</a></h3>
        <div class="barra"> Fires before the component is shown when calling the show method. Return false from an event handler to stop the show.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onDeactivate </a></h3>
        <div class="barra"> Fires after a Component has been visually deactivated.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onDisable</a></h3>
        <div class="barra"> Fires after the component is disabled.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onEditModechange </a></h3>
        <div class="barra"> Fires when the editor switches edit modes
        <br /><br />
        <b>Parameter</b>
        <br /><br />
        &bull; htmlEditor : Ext.form.field.HtmlEditor <br />
        &bull; sourceEdit : Boolean
        <br /><br />
        True if source edit, false if standard editing. <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onHide</a></h3>
        <div class="barra"> Fires after the component is hidden. Fires after the component is hidden when calling the hide method.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onInitialize </a></h3>
        <div class="barra"> Fires when the editor is fully initialized (including the iframe)
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; htmlEditor : Ext.form.field.HtmlEditor <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onMove </a></h3>
        <div class="barra"> Fires after the component is moved.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; x : Number
        <br /><br />
        The new x position <br />
        &bull; y : Number
        <br /><br />
        The new y position <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onPush </a></h3>
        <div class="barra"> Fires when the iframe editor is updated with content from the textarea.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; htmlEditor : Ext.form.field.HtmlEditor <br />
        &bull; html : String <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onRemoved </a></h3>
        <div class="barra"> Fires when a component is removed from an Ext.container.Container
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br/>
        &bull; container : Ext.container.Container
        <br /><br />
        Container which holds the component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRender</a></h3>
        <div class="barra"> Fires after the component markup is rendered.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onResize</a></h3>
        <div class="barra"> Fires after the component is resized.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; adjWidth : Number
        <br /><br />
        The box-adjusted width that was set <br />
        &bull; adjHeight : Number
        <br /><br />
        The box-adjusted height that was set <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onShow </a></h3>
        <div class="barra"> Fires after the component is shown when calling the show method.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onSync</a></h3>
        <div class="barra"> Fires when the textarea is updated with content from the editor iframe.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; htmlEditor : Ext.form.field.HtmlEditor <br />
        &bull; isValid : String <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#">onValidityChange </a></h3>
        <div class="barra"> Fires when a change in the field's validity is detected.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; field : Ext.form.field.Field <br />
        &bull; isValid : Boolean
        <br /><br />
        Whether or not the field is now valid <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
</div>