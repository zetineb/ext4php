<?php 
include("principal.html");
?>
    
<h2 class="demoHeaders">Date</h2>
<div id="accordion">
	<div>
        <h3><a href="#"> activeError: <strong class="stitulo"> String  </strong></a></h3>
        <div class="barra">If specified, then the component will be displayed with this value as its active error when first rendered. Use setActiveError or unsetActiveError to 			        change it after component creation.</div>
    </div> 
    <div>
        <h3><a href="#"> allowBlank: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Specify false to validate that the value's length is > 0
        <br /><br />
        Defaults to: true</div>
    </div> 
    <div>
        <h3><a href="#"> altFormats: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Multiple date formats separated by "|" to try when parsing a user input value and it does not match the defined format.
        <br /><br />
        Defaults to: "m/d/Y|n/j/Y|n/j/y|m/j/y|n/d/y|m/j/Y|n/d/Y|m-d-y|m-d-Y|m/d|m-d|md|mdy|mdY|d|Y-m-d|n-j|n/j"</div>
    </div> 
    <div>
        <h3><a href="#"> baseCls: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The base CSS class to apply to this components's element. This will also be prepended to elements within this component like Panel's body will get a        class x-panel-body. This means that if you create a subclass of Panel, and you want it to get all the Panels styling for the element and the body, you leave        the baseCls x-panel and use componentCls to add specific styling for this component.
        <br /><br />
        Defaults to: "x-component"</div>
    </div> 
    <div>
        <h3><a href="#"> blankText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The error text to display if the <b>allowBlank</b> validation fails
        <br /><br />
        Defaults to: "This field is required"</div>
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
        <div class="barra">An optional extra CSS class that will be added to this component's Element. This can be useful for adding customized styles to the component or any of 			        its children using standard CSS rules.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> disabled: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">True to disable the field. Disabled Fields will not be <b>submitted</b>.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> disabledDates: <strong class="stitulo"> String[] </strong></a></h3>
        <div class="barra">An array of "dates" to disable, as strings. These strings will be used to build a dynamic regular expression so they are very powerful.</div>
    </div>
    <div>
        <h3><a href="#"> disabledDatesText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The tooltip text to display when the date falls on a disabled date.
        <br /><br />
        Defaults to: "Disabled"</div>
    </div> 
    <div>
        <h3><a href="#"> disabledDays: <strong class="stitulo"> Number[] </strong></a></h3>
        <div class="barra">An array of days to disable, 0 based.</div>
    </div> 
    <div>
        <h3><a href="#"> disabledDaysText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The tooltip to display when the date falls on a disabled day.
        <br /><br />
        Defaults to: "Disabled"</div>
    </div> 
    <div>
        <h3><a href="#"> editable: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">False to prevent the user from typing text directly into the field; the field can only have its value set via selecting a value from the picker. In 	        this state, the picker can also be opened by clicking directly on the input field itself.
        <br /><br />
        Defaults to: true</div>
    </div> 
    <div>
        <h3><a href="#"> emptyText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The default text to place into an empty field.
        <br /><br />
        Note that normally this value will be submitted to the server if this field is enabled; to prevent this you can set the submitEmptyText option of   	        Ext.form.Basic.submit to false.
        <br /><br />
        Also note that if you use inputType:'file', emptyText is not supported and should be avoided.</div>
    </div> 
    <div>
        <h3><a href="#"> enableKeyEvents: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">true to enable the proxying of key events for the HTML input field
        <br /><br />
        Defaults to: false</div>
    </div> 
    <div>
        <h3><a href="#"> fieldLabel: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The label for the field. It gets appended with the labelSeparator, and its position and sizing is determined by the labelAlign, labelWidth, and        labelPad configs.</div>
    </div> 
    <div>
        <h3><a href="#"> format: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The default date format string which can be overriden for localization support. The format must be valid according to Ext.Date.parse.
        <br /><br />
        Defaults to: "m/d/Y"</div>
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
        <div class="barra">An HTML fragment, or a DomHelper specification to use as the layout element content. The HTML content is added after the component is rendered, so the 	        document will not contain this HTML at the time the render event is fired. This content is inserted into the body before any configured contentEl is     		        appended.
        <br /><br />
        Defaults to: ""</div>
    </div>
    <div>
        <h3><a href="#"> invalidText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The error text to display when the date in the field is invalid.
        <br /><br />
        Defaults to: "{0} is not a valid date - it must be in the format {1}"</div>
    </div>
    <div>
        <h3><a href="#"> labelAlign: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Controls the position and alignment of the fieldLabel. Valid values are:
		<br /><br />
   	 	&bull; "left" (the default) - The label is positioned to the left of the field, with its text aligned to the left. Its width is determined by the labelWidth        config.<br />
        &bull; "top" - The label is positioned above the field.<br />
        &bull; "right" - The label is positioned to the left of the field, with its text aligned to the right. Its width is determined by the labelWidth config.
        <br /><br />
        Defaults to: "left"</div>
    </div>
    <div>
        <h3><a href="#"> labelPad: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The amount of space in pixels between the fieldLabel and the input field.
        <br /><br />
        Defaults to: 5</div>
    </div>
    <div>
        <h3><a href="#"> labelSeparator: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Character(s) to be inserted at the end of the label text.
        <br /><br />
        Defaults to: ":"</div>
    </div>
    <div>
        <h3><a href="#"> labelWidth: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">The width of the fieldLabel in pixels. Only applicable if the labelAlign is set to "left" or "right".
        <br /><br />
        Defaults to: 100</div>
    </div>
    <div>
        <h3><a href="#"> margin: <strong class="stitulo"> Number/String </strong></a></h3>
        <div class="barra">Specifies the margin for this component. The margin can be a single numeric value to apply to all sides or it can be a CSS style specification for each        style, for example: '10 5 3 10'.</div>
    </div>
    <div>
        <h3><a href="#"> maskRe: <strong class="stitulo"> RegExp </strong></a></h3>
        <div class="barra">An input mask regular expression that will be used to filter keystrokes (character being typed) that do not match. Note: It dose not filter characters        already in the input.</div>
    </div>
    <div>
        <h3><a href="#"> maxLength: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">Maximum input field length allowed by validation (defaults to Number.MAX_VALUE). This behavior is intended to provide instant feedback to the user by        improving usability to allow pasting and editing or overtyping and back tracking. To restrict the maximum number of characters that can be entered into the        field use the <b>enforceMaxLength</b> option.</div>
    </div>
    <div>
        <h3><a href="#"> maxLengthText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Error text to display if the <b> maximum length</b> validation fails
        <br /><br />
        Defaults to: "The maximum length for this field is {0}"</div>
    </div>
    <div>
        <h3><a href="#"> maxText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The error text to display when the date in the cell is after maxValue.
        <br /><br />
        Defaults to: "The date in this field must be equal to or before {0}"</div>
    </div>
    <div>
        <h3><a href="#"> maxValue: <strong class="stitulo"> Date/String </strong></a></h3>
        <div class="barra">The maximum allowed date. Can be either a Javascript date object or a string date in a valid format.</div>
    </div>
    <div>
        <h3><a href="#"> minLength: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">Minimum input field length required
        <br /><br />
        Defaults to: 0</div>
    </div>
    <div>
        <h3><a href="#"> minLengthText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">Error text to display if the minimum length validation fails.
        <br /><br />
        Defaults to: "The <b> minimum length</b> for this field is {0}"</div>
    </div>
    <div>
        <h3><a href="#"> minText: <strong class="stitulo"> String </strong></a></h3>
        <div class="barra">The error text to display when the date in the cell is before minValue.
        <br /><br />
        Defaults to: "The date in this field must be equal to or after {0}"</div>
    </div>
    <div>
        <h3><a href="#"> minValue: <strong class="stitulo">Date/String  </strong></a></h3>
        <div class="barra">The minimum allowed date. Can be either a Javascript date object or a string date in a valid format.</div>
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
        <div class="barra">true to prevent the user from changing the field, and hides the trigger. Supercedes the editable and hideTrigger options if the value is true.
        <br /><br />
        Defaults to: false</div>
    </div>
    <div>
        <h3><a href="#"> showToday: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">false to hide the footer area of the Date picker containing the Today button and disable the keyboard handler for spacebar that selects the current        date.
        <br /><br/>
        Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#"> startDay: <strong class="stitulo"> Number </strong></a></h3>
        <div class="barra">Day index at which the week should begin, 0-based (defaults to Sunday)
        <br /><br />
        Defaults to: 0</div>
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
        <h3><a href="#"> validateOnBlur: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Whether the field should validate when it loses focus. This will cause fields to be validated as the user steps through the fields in the form   	  	     	regardless of whether they are making changes to those fields along the way. See also validateOnChange.
        <br /><br />
        Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#"> validateOnChange: <strong class="stitulo"> Boolean </strong></a></h3>
        <div class="barra">Specifies whether this field should be validated immediately whenever a change in its value is detected. If the validation results in a change in the        field's validity, a validitychange event will be fired. This allows the field to show feedback about the validity of its contents immediately as the user is        typing.
		<br /><br />
		When set to false, feedback will not be immediate. However the form will still be validated before submitting if the clientValidation option to 		        Ext.form.Basic.doAction is enabled, or if the field or form are validated manually.
		<br /><br />
		See also Ext.form.field.Base.checkChangeEvents for controlling how changes to the field's value are detected.
		<br /><br />
		Defaults to: true</div>
    </div>
    <div>
        <h3><a href="#"> validator: <strong class="stitulo"> Function </strong></a></h3>
        <div class="barra">A custom validation function to be called during field validation (getErrors). If specified, this function will be called first, allowing the developer        to override the default validation process.
		<br /><br />
 		This function will be passed the following parameters: <br /><br />
		<b>Parameters</b>
		<br />
    	&bull; value : Object
		<br />
        The current field value
	    <br /><br />
		<b>Returns</b>
		<br />
    	&bull; Boolean/String <br />
        &nbsp;&nbsp; &bull; True if the value is valid <br />
        &nbsp;&nbsp; &bull; An error message if the value is invalid </div>
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