ihqs.wysiwyg.ckeditor = function(settings, theme)
{
    this.checkDependencies();

    this.settings = settings;
    this.theme    = theme;
}

ihqs.wysiwyg.ckeditor.prototype.checkDependencies = function()
{

}

ihqs.wysiwyg.ckeditor.prototype.processSettings = function()
{
    if(this.settings != "custom")
    {
        this.processedSettings = (typeof(this.settings) == "string") ? ihqs.wysiwyg.ckeditor.settings[this.settings] : this.settings;
    }
    else
    {
        this.processedSettings = ihqs.wysiwyg.customSettings;
    }
}

ihqs.wysiwyg.ckeditor.prototype.processTheme = function()
{
    this.processedSettings.skin = this.theme;
}

ihqs.wysiwyg.ckeditor.prototype.handle = function(selector)
{
    this.selector = selector;

    this.processSettings();
    this.processTheme();

    CKEDITOR.replace($('.' + this.selector).get(0), this.processedSettings);
    CKEDITOR.plugins.addExternal( 'nuitblanche', '/bundles/ihqsnuitblanche/js/ckeditor/plugins/nuitblanche/' );
}

ihqs.wysiwyg.ckeditor.settings = {

    "default" : {
        toolbar : [
            ['Format', 'Bold', 'Italic', 'Strike', 'RemoveFormat', '-', 'Image', 'Link', '-', 'Clean', 'Preview']
        ]
    },

    "full" : {
        toolbar : 'Full'
    }
}
