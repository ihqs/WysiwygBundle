ihqs.wysiwyg.markitup = function(settings, theme)
{
    this.checkDependencies();

    this.settings = settings;
    this.theme    = theme;
}

ihqs.wysiwyg.markitup.prototype.checkDependencies = function()
{
    if(typeof($) == "undefined")
    {
        throw new ihqs.wysiwyg.exception('markItUp! library needs jQuery library');
    }
}

ihqs.wysiwyg.markitup.prototype.processSettings = function()
{
    if(this.settings != "custom")
    {
        ihqs.wysiwyg.addStyle('/vendor/markitup/markitup/sets/' + this.settings + '/style.css');
        this.processedSettings = (typeof(this.settings) == "string") ? ihqs.wysiwyg.markitup.settings[this.settings] : this.settings;
    }
    else
    {
        this.processedSettings = ihqs.wysiwyg.customSettings;
    }
}

ihqs.wysiwyg.markitup.prototype.processTheme = function()
{
    if(this.theme == "custom") { return ; }
    ihqs.wysiwyg.addStyle('/vendor/markitup/markitup/skins/' + this.theme + '/style.css');
}

ihqs.wysiwyg.markitup.prototype.handle = function(selector)
{
    this.selector = selector;

    this.processSettings();
    this.processTheme();
    
    $('textarea.' + this.selector).markItUp(this.processedSettings);
}

ihqs.wysiwyg.markitup.settings = {

    "default" : {
        name: "html",
        onShiftEnter:  	{ keepDefault: false, replaceWith: '<br />\n' },
        onCtrlEnter:  	{ keepDefault: false, openWith: '\n<p>', closeWith : '</p>' },
        onTab:    	{ keepDefault: false, replaceWith: '    '},
        markupSet:  [
            {name : 'Bold',             key : 'B',  openWith : '(!(<strong>|!|<b>)!)',  closeWith : '(!(</strong>|!|</b>)!)' },
            {name : 'Italic',           key : 'I',  openWith : '(!(<em>|!|<i>)!)',      closeWith : '(!(</em>|!|</i>)!)'  },
            {name : 'Stroke through',   key : 'S',  openWith : '<del>',                 closeWith : '</del>' },
            {separator : '---------------' },
            {name : 'Picture',          key : 'P',  replaceWith :   '<img src="[![Source : ! : http : //]!]" alt="[![Alternative text]!]" />' },
            {name : 'Link',             key : 'L',  openWith :      '<a href="[![Link : ! : http : //]!]"(!( title="[![Title]!]")!)>', closeWith : '</a>', placeHolder : 'Your text to link...' },
            {separator : '---------------' },
            {name : 'Clean',    className : 'clean',    replaceWith : function(markitup) { return markitup.selection.replace(/<(.*?)>/g, "") } },
            {name : 'Preview',  className : 'preview',  call : 'preview'}
        ]
    }
}
