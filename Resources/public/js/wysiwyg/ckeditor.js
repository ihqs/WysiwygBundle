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

}

ihqs.wysiwyg.ckeditor.prototype.processTheme = function()
{
    
}

ihqs.wysiwyg.ckeditor.prototype.handle = function(selector)
{
    this.selector = selector;

    this.processSettings();
    this.processTheme();

    var textareas = document.getElementsByTagName('textarea');
    for(key in textareas)
    {
        var textarea = textareas[key];
        if(textarea.className != this.selector) { continue; }

        CKEDITOR.replace(textarea);
    }
}

ihqs.wysiwyg.ckeditor.settings = {

    "default" : {
    }
}
