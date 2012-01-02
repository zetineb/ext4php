<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Toolbar</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> onActivate </a></h3>
        <div class="barra"> Fires after a Component has been visually activated.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAdd </a></h3>
        <div class="barra"> @bubbles Fires after any Ext.Component is added or inserted into the container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container
        <br /><br />
        &bull; component : Ext.Component
        <br />
        The component that was added
        <br /><br />
        &bull; index : Number
        <br />
        The index at which the component was added to the container's items collection
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAdded </a></h3>
        <div class="barra"> Fires after a Component had been added to a Container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; container : Ext.container.Container
        <br />
        Parent Container
        <br /><br />
        &bull; pos : Number
        <br />
        position of Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onAfterLayout </a></h3>
        <div class="barra"> Fires when the components in this container are arranged by the associated layout manager.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container
        <br /><br />
        &bull; layout : Ext.layout.container.Container
        <br />
        The ContainerLayout implementation for this container
        <br /><br />
        &bull; options : Object
        <br />
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
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeActivate </a></h3>
        <div class="barra"> Fires before a Component has been visually activated. Returning false from an event listener can prevent the activate from occurring.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; this : Ext.Component
        <br /><br />
        &bull; eOpts : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeAdd </a></h3>
        <div class="barra"> Fires before any Ext.Component is added or inserted into the container. A handler can return false to cancel the add.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container
        <br /><br />
        &bull; component : Ext.Component
        <br />
        The component being added
        <br /><br />
        &bull; index : Number
        <br />
        The index at which the component will be added to the container's items collection
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeDeactivate </a></h3>
        <div class="barra"> Fires before a Component has been visually deactivated. Returning false from an event listener can prevent the deactivate from occurring.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeDestroy </a></h3>
        <div class="barra"> Fires before the component is destroyed. Return false from an event handler to stop the destroy.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeHide </a></h3>
        <div class="barra"> Fires before the component is hidden when calling the hide method. Return false from an event handler to stop the hide.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeRemove </a></h3>
        <div class="barra"> Fires before any Ext.Component is removed from the container. A handler can return false to cancel the remove.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container
        <br /><br />
        &bull; component : Ext.Component
        <br />
        The component being removed
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeRender </a></h3>
        <div class="barra"> Fires before the component is rendered. Return false from an event handler to stop the render.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onBeforeShow </a></h3>
        <div class="barra"> Fires before the component is shown when calling the show method. Return false from an event handler to stop the show.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onDeactivate </a></h3>
        <div class="barra"> Fires after a Component has been visually deactivated.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; opitons : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onDestroy </a></h3>
        <div class="barra"> Fires after the component is destroyed.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onDisable </a></h3>
        <div class="barra"> Fires after the component is disabled.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onEnable </a></h3>
        <div class="barra"> Fires after the component is enabled.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onHide </a></h3>
        <div class="barra"> Fires after the component is hidden. Fires after the component is hidden when calling the hide method.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onMove </a></h3>
        <div class="barra"> Fires after the component is moved.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; x : Number
        <br />
        The new x position
        <br /><br />
        &bull; y : Number
        <br />
        The new y position
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRemove </a></h3>
        <div class="barra"> @bubbles Fires after any Ext.Component is removed from the container.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; container : Ext.container.Container
        <br /><br />
        &bull; component : Ext.Component
        <br />
        The component that was removed
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRemoved </a></h3>
        <div class="barra"> Fires when a component is removed from an Ext.container.Container
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; container : Ext.container.Container
        <br />
        Container which holds the component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onRender </a></h3>
        <div class="barra"> Fires after the component markup is rendered.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onResize </a></h3>
        <div class="barra"> Fires after the component is resized.
        <br /><br/>
        <b>Parameters</b>
        <br /><br/>
        &bull; component : Ext.Component
        <br /><br/>
        &bull; adjWidth : Number
        <br />
        The box-adjusted width that was set
        <br /><br/>
        &bull; adjHeight : Number
        <br />
        The box-adjusted height that was set
        <br /><br/>
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
    <div>
        <h3><a href="#"> onShow </a></h3>
        <div class="barra"> Fires after the component is shown when calling the show method.
        <br /><br />
        <b>Parameters</b>
        <br /><br />
        &bull; component : Ext.Component
        <br /><br />
        &bull; options : Object
        <br />
        The options object passed to Ext.util.Observable.addListener. </div>
    </div>
</div>