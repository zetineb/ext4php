<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">CheckBoxgroup</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> onActivate </a></h3>
        <div class="barra"> Fires after a Component has been visually activated.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAdd </a></h3>
        <div class="barra"> @bubbles Fires after any Ext.Component is added or inserted into the container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container <br />
        &bull; component : Ext.Component
        <br /><br />
        The component that was added <br />
        &bull; index : Number
        <br /><br />
        The index at which the component was added to the container's items collection <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAdded </a></h3>
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
        <h3><a href="#"> onAfterLayout </a></h3>
        <div class="barra"> Fires when the components in this container are arranged by the associated layout manager.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container <br />
        &bull; layout : Ext.layout.container.Container
        <br /><br />
        The ContainerLayout implementation for this container <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAfterRender </a></h3>
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
        <h3><a href="#"> onBeforeActivate </a></h3>
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
        <h3><a href="#"> onBeforeAdd </a></h3>
        <div class="barra"> Fires before any Ext.Component is added or inserted into the container. A handler can return false to cancel the add.
        <br /><br/>
        <b>Parameters</b>
        <br /><br/>
        &bull; container : Ext.container.Container <br />
        &bull; component : Ext.Component
        <br /><br/>
        The component being added <br />
        &bull; index : Number
        <br /><br/>
        The index at which the component will be added to the container's items collection <br />
        &bull; options : Object
        <br /><br/>
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeDestroy </a></h3>
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
        <h3><a href="#"> onBeforeHide </a></h3>
        <div class="barra"> Fires before the component is hidden when calling the hide method. Return false from an event handler to stop the hide.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component  <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeRender </a></h3>
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
        <h3><a href="#"> onBeforeShow </a></h3>
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
        <h3><a href="#"> onChange </a></h3>
        <div class="barra"> Fires when a user-initiated change is detected in the value of the field.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.form.field.Field <br />
        &bull; newValue : Object
        <br /><br />
        The new value <br />
        &bull; oldValue : Object
        <br /><br />
        The original value <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onDeactivate </a></h3>
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
        <h3><a href="#"> onDisable </a></h3>
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
        <h3><a href="#"> onEnable </a></h3>
        <div class="barra"> Fires after the component is enabled.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onHide </a></h3>
        <div class="barra"> Fires after the component is hidden. Fires after the component is hidden when calling the hide method.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br/>
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onMove </a></h3>
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
        <h3><a href="#"> onRemove </a></h3>
        <div class="barra"> @bubbles Fires after any Ext.Component is removed from the container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container <br />
        &bull; component : Ext.Component
        <br /><br />
        The component that was removed <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRemoved </a></h3>
        <div class="barra"> Fires when a component is removed from an Ext.container.Container
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component <br />
        &bull; container : Ext.container.Container
        <br /><br />
        Container which holds the component <br />
        &bull; options : Object
        <br /><br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRender </a></h3>
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
        <h3><a href="#"> onResize </a></h3>
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
        <h3><a href="#"> onShow </a></h3>
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
        <h3><a href="#"> onValidityChange </a></h3>
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