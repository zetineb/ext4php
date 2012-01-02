<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Column</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> columns: <strong class="stitulo"> Object[] </strong></a></h3>
        <div class="barra"> An optional array of sub-column definitions. This column becomes a group, and houses the columns defined in the columns config.
        <br /><br />
        Group columns may not be sortable. But they may be hideable and moveable. And you may move headers into and out of a group. Note that if all sub columns are dragged out of a group, the group is destroyed. </div>
    </div>
    <div>
        <h3><a href="#"> dataIndex: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The name of the field in the grid's Ext.data.Store's Ext.data.Model definition from which to draw the column's value. <b>Required.</b>
        <br /><br />
        Defaults to: null </div>
    </div>
    <div>
        <h3><a href="#"> draggable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable drag-drop reordering of this column. Defaults to true.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> field: <strong class="stitulo"> Object/String - deprecated </strong></a></h3>
        <div class="barra"> Alias for editor.
        <br /><br />
        This cfg has been deprecated since 4.0.5
        <br /><br />
        Use editor instead. </div>
    </div>
    <div>
        <h3><a href="#"> groupable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> If the grid uses a Ext.grid.feature.Grouping, this option may be used to disable the header menu item to group by the column selected. By default, the header menu group option is enabled. Set to false to disable (but still show) the group option in the header menu for the column. </div>
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
        <h3><a href="#"> hideable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to prevent the user from hiding this column. Defaults to true.
        <br /><br />
        Defaults to: true </div>
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
        <h3><a href="#"> menuDisabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> True to disable the column header menu containing sort/hide options. Defaults to false.
        <br /><br />
        Defaults to: false </div>
    </div>
    <div>
        <h3><a href="#"> sortable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra"> False to disable sorting of this column. Whether local/remote sorting is used is specified in Ext.data.Store.remoteSort. Defaults to true.
        <br /><br />
        Defaults to: true </div>
    </div>
    <div>
        <h3><a href="#"> text: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra"> The header text to be used as innerHTML (html tags are accepted) to display in the Grid. Note: to have a clickable header with no text displayed you can use the default of &#160; aka &nbsp;.
        <br //><br />
        Defaults to: "&#160;" </div>
    </div>
    <div>
        <h3><a href="#"> width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra"> The width of this component in pixels. </div>
    </div>
</div>