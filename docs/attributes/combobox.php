<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">ComboBox</h2>
<div id="accordion">
	<div>
        <h3><a href="#">activeError: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">If specified, then the component will be displayed with this value as its active error when first rendered. Use setActiveError or unsetActiveError to change it after component creation.</div>
    </div> 
    <div>
        <h3><a href="#">allowBlank: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Specify false to validate that the value's length is > 0
<br /><br />
Defaults to: true</div>
    </div> 
    <div>
        <h3><a href="#">autoLoad: <strong class="stitulo"> Boolean/Object </strong></a></h3>
        <div class="barra">If data is not specified, and if autoLoad is true or an Object, this store's load method is automatically called after creation. If the        value of autoLoad is an Object, this Object will be passed to the store's load method. Defaults to false.
        <br /><br />
        Defaults to: false</div>
    </div> 
    <div>
        <h3><a href="#">autoSelect: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to automatically highlight the first result gathered by the data store in the dropdown list when it is opened. A false value would cause nothing in the list to be highlighted automatically, so the user would have to manually highlight an item before pressing the enter or tab key to select it (unless the value of (typeAhead) were true), or use the mouse to select a value.
<br /><br />
Defaults to: true</div>
    </div> 
    <div>
        <h3><a href="#">baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave the baseCls x-panel and use componentCls to add specific styling for this component.
<br /><br />
Defaults to: "x-component"</div>
    </div> 
    <div>
        <h3><a href="#">blankText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The error text to display if the allowBlank validation fails
<br /><br />
Defaults to: "This field is required"</div>
    </div> 
    <div>
        <h3><a href="#">border: <strong class="stitulo">Number/String  </strong></a></h3>
        <div class="barra">Specifies the border for this component. The border can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div> 
    <div>
        <h3><a href="#">clearCls: <strong class="stitulo">String  </strong></a></h3>
        <div class="barra">The CSS class to be applied to the special clearing div rendered directly after the field contents wrapper to provide field clearing.
<br /><br />
Defaults to: "x-clear"</div>
    </div> 
    <div>
        <h3><a href="#">cls: <strong class="stitulo">String  </strong></a></h3>
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
<br /><br />
Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#">data: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra">The initial set of data to apply to the tpl to update the content area of the Component.</div>
    </div> 
    <div>
        <h3><a href="#">disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the field. Disabled Fields will not be submitted.
<br /><br />
Defaults to: false</div>
    </div> 
    <div>
        <h3><a href="#">displayField: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The underlying data field name to bind to this ComboBox.
<br /><br />
See also valueField.
<br /><br />
Defaults to: "text"</div>
    </div> 
    <div>
        <h3><a href="#">editable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">False to prevent the user from typing text directly into the field; the field can only have its value set via selecting a value from the picker. In this state, the picker can also be opened by clicking directly on the input field itself.
<br /><br />
Defaults to: true</div>
    </div> 
    <div>
        <h3><a href="#">emptyText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">
        The default text to place into an empty field.
<br /><br />
Note that normally this value will be submitted to the server if this field is enabled; to prevent this you can set the submitEmptyText option of Ext.form.Basic.submit to false.
<br /><br />
Also note that if you use inputType:'file', emptyText is not supported and should be avoided.</div>
    </div>
    <div>
        <h3><a href="#">enableKeyEvents: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to enable the proxying of key events for the HTML input field
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">eventName: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Name registred in php event Tapplication</div>
    </div>
    <div>
        <h3><a href="#">fieldLabel: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The label for the field. It gets appended with the labelSeparator, and its position and sizing is determined by the labelAlign, labelWidth, and labelPad configs.</div>
    </div>
    <div>
        <h3><a href="#">fields: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Field names for store</div>
    </div>
    <div>
        <h3><a href="#">forceSelection: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to restrict the selected value to one of the values in the list, false to allow the user to set arbitrary text into the field.
<br /><br />
Defaults to: false</div>
    </div> 
    <div>
        <h3><a href="#">height: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The height of this component in pixels.</div>
    </div>
    <div>
        <h3><a href="#">hidden: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to hide the component.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">html: <strong class="stitulo"> String/Object </strong></a></h3>
        <div class="barra">
        An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is appended.
<br /><br />
Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#">invalidText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">
        The error text to use when marking a field invalid and no message is provided
<br /><br />
Defaults to: "The value in this field is invalid"</div>
    </div>
    <div>
        <h3><a href="#">labelAlign: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">
        Controls the position and alignment of the fieldLabel. Valid values are:
<br /><br />
    &bull; "left" (the default) - The label is positioned to the left of the field, with its text aligned to the left. Its width is determined by the labelWidth config. <br />
    &bull; "top" - The label is positioned above the field. 
<br />    
    &bull; "right" - The label is positioned to the left of the field, with its text aligned to the right. Its width is determined by the labelWidth config.
<br /><br />
Defaults to: "left"</div>
    </div>
    <div>
        <h3><a href="#">labelPad: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">
        The amount of space in pixels between the fieldLabel and the input field.
<br /><br />
Defaults to: 5</div>
    </div>
    <div>
        <h3><a href="#">labelSeparator: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">
        Character(s) to be inserted at the end of the label text.
<br /><br />
Defaults to: ":"</div>
    </div>
    <div>
        <h3><a href="#">labelWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">
        The width of the fieldLabel in pixels. Only applicable if the labelAlign is set to "left" or "right".
<br /><br />
Defaults to: 100</div>
    </div>
    <div>
        <h3><a href="#">margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#">maskRe: <strong class="stitulo"> RegExp </strong></a></h3>
        <div class="barra">An input mask regular expression that will be used to filter keystrokes (character being typed) that do not match. Note: It dose not filter characters already in the input.</div>
    </div>
    <div>
        <h3><a href="#">maxLength: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">Maximum input field length allowed by validation (defaults to Number.MAX_VALUE). This behavior is intended to provide instant feedback to the user by improving usability to allow pasting and editing or overtyping and back tracking. To restrict the maximum number of characters that can be entered into the field use the enforceMaxLength option.</div>
    </div>
    <div>
        <h3><a href="#">maxLengthText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Error text to display if the maximum length validation fails
<br /><br />
Defaults to: "The maximum length for this field is {0}"</div>
    </div>
    <div>
        <h3><a href="#">minLength: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">Minimum input field length required
<br /><br />
Defaults to: 0</div>
    </div>
    <div>
        <h3><a href="#">minLengthText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Error text to display if the minimum length validation fails.
<br /><br />
Defaults to: "The minimum length for this field is {0}"</div>
    </div>
    <div>
        <h3><a href="#">multiSelect: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">If set to true, allows the combo field to hold more than one value at a time, and allows selecting multiple items from the dropdown list. The combo's text field will show all selected values separated by the delimiter.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">name: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The name of the field. This is used as the parameter name when including the field value in a form submit(). If no name is configured, it falls back to the inputId. To prevent the field from being included in the form submit, set submitValue to false.</div>
    </div>
    <div>
        <h3><a href="#">padding: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the padding for this component. The padding can be a single numeric value to apply to all sides or it can be a CSS style specification for each style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#">queryMode: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The mode in which the ComboBox uses the configured Store. Acceptable values are:
<br /><br />
    &bull; 'remote' :
<br /><br />
      In queryMode: 'remote', the ComboBox loads its Store dynamically based upon user interaction.
<br /><br />
      This is typically used for "autocomplete" type inputs, and after the user finishes typing, the Store is loaded.
<br /><br />
      A parameter containing the typed string is sent in the load request. The default parameter name for the input string is query, but this can be configured using the queryParam config.
<br /><br />
      In queryMode: 'remote', the Store may be configured with remoteFilter: true, and further filters may be programatically added to the Store which are then passed with every load request which allows the server to further refine the returned dataset.
<br /><br />
      Typically, in an autocomplete situation, hideTrigger is configured true because it has no meaning for autocomplete.
<br /><br />   
    &bull; 'local' :
<br /><br />
      ComboBox loads local data <br /><br />

      Defaults to: "remote"</div>
    </div>
    <div>
        <h3><a href="#">queryParam: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Name of the parameter used by the Store to pass the typed string when the ComboBox is configured with queryMode: 'remote'. If explicitly set to a falsy value it will not be sent.
<br /><br />
Defaults to: "query"</div>
    </div>
    <div>
        <h3><a href="#">readOnly: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to prevent the user from changing the field, and hides the trigger. Supercedes the editable and hideTrigger options if the value is true.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">root: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The name of the property which contains the Array of row objects. For JSON reader it's dot-separated list of property names. For XML        reader it's a CSS selector. For array reader it's not applicable.
        <br /><br />
        By default the natural root of the data will be used. The root Json array, the root XML element, or the array.
        <br /><br />
        The data packet value for this property should be an empty array to clear the data or show no data.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#">selectOnFocus: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to select any existing text in the field immediately on focus. Only applies when editable = true
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">selectOnTab: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Whether the Tab key should select the currently highlighted item.
<br /><br />
Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#">style: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">A custom style specification to be applied to this component's Element. Should be a valid argument to Ext.Element.applyStyles. 
        </div>
    </div>
    <div>
        <h3><a href="#">tabIndex: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The tabIndex for this field. Note this only applies to fields that are rendered, not those which are built via applyTo</div>
    </div>
    <div>
        <h3><a href="#">totalProperty: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Name of the property from which to retrieve the total number of records in the dataset. This is only needed if the whole dataset is not        passed in one go, but is being paged from the remote server. Defaults to total.
        <br /><br />
        Defaults to: "total"</div>
    </div>
    <div>
        <h3><a href="#">tpl: <strong class="stitulo"> Ext.XTemplate/Ext.Template/String/String[] </strong></a></h3>
        <div class="barra">An Ext.Template, Ext.XTemplate or an array of strings to form an Ext.XTemplate. Used in conjunction with the data and tplWriteMode configurations.
        </div>
    </div>
    <div>
        <h3><a href="#">triggerAction: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The action to execute when the trigger is clicked.
<br /><br />
    &bull; 'all' :
<br /><br />
      run the query specified by the allQuery config option
<br /><br />      
    &bull; 'query' :
<br /><br />
      run the query using the raw value.
<br /><br />
See also queryParam.
<br /><br />
Defaults to: "all"</div>
    </div>
    <div>
        <h3><a href="#">typeAhead: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to populate and autoselect the remainder of the text being typed after a configurable delay (typeAheadDelay) if it matches a known value.
<br /><br />
Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#">validateOnBlur: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Whether the field should validate when it loses focus. This will cause fields to be validated as the user steps through the fields in the form regardless of whether they are making changes to those fields along the way. See also validateOnChange.
<br /><br />
Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#">validateOnChange: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Specifies whether this field should be validated immediately whenever a change in its value is detected. If the validation results in a change in the field's validity, a validitychange event will be fired. This allows the field to show feedback about the validity of its contents immediately as the user is typing.
<br /><br />
When set to false, feedback will not be immediate. However the form will still be validated before submitting if the clientValidation option to Ext.form.Basic.doAction is enabled, or if the field or form are validated manually.
<br /><br />
See also Ext.form.field.Base.checkChangeEvents for controlling how changes to the field's value are detected.
<br /><br />
Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#">validator: <strong class="stitulo"> Function </strong></a></h3>
        <div class="barra">A custom validation function to be called during field validation (getErrors). If specified, this function will be called first, allowing the developer to override the default validation process.
<br /><br />
This function will be passed the following parameters: 
<br /><br />
<b>Parameters</b>
<br />
    * value : Object 
<br />
      The current field value
<br /><br />
<b>Returns</b>
<br />
    * Boolean/String <br />
          &bull; True if the value is valid <br />
          &bull; An error message if the value is invalid 
</div>
    </div>
    <div>
        <h3><a href="#">value: <strong class="stitulo"> Object </strong></a></h3>
        <div class="barra">A value to initialize this field with.</div>
    </div>
    <div>
        <h3><a href="#">valueField: <strong class="stitulo"> String <i>required</i> </strong></a></h3>
        <div class="barra">The underlying data value name to bind to this ComboBox (defaults to match the value of the displayField config).
<br /><br />
<b>Note:</b> use of a valueField requires the user to make a selection in order for a value to be mapped. See also displayField.</div>
    </div>
    <div>
        <h3><a href="#">valueNotFoundText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">When using a name/value combo, if the value passed to setValue is not found in the store, valueNotFoundText will be displayed as the field text if defined. If this default text is used, it means there is no value set and no validation will occur on this field.</div>
    </div>
    <div>
        <h3><a href="#">width: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of this component in pixels.</div>
    </div>
</div>