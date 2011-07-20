if(typeof(ihqs) == "undefined") { ihqs = {} }

ihqs.wysiwyg = function(selector, editor)
{
    this.selector = selector;
    this.handler  = editor.library;
    this.set      = editor.set;
    this.theme    = editor.theme;
}

ihqs.wysiwyg.base_uri = '/bundles/ihqswysiwyg/js';
ihqs.wysiwyg.handlers = {
    markitup : true,
    ckeditor : '/vendor/ckeditor/ckeditor.js'
}

ihqs.wysiwyg.prototype.initHandler = function()
{
    try
    {
        var self = this;

        // veryfing handler existence
        var exists = ihqs.wysiwyg.handlers[this.handler];
        if(!exists)
        {
            throw new ihqs.wysiwyg.exception('Handler "' + this.handler + '" is not recognized');
        }
        ihqs.wysiwyg.addScript('/wysiwyg/' + this.handler + '.js', function() { self.doInitHandler.apply(self); });
    }

    catch(e)
    {
        console.log('[' + e.name + '] ' + e.message);
    }
}

ihqs.wysiwyg.prototype.doInitHandler = function()
{
    var editor_handler = ihqs.wysiwyg[this.handler];
    this.editor = new editor_handler(this.set, this.theme);
    this.editor.handle(this.selector);
}

ihqs.wysiwyg.customSettings = null
ihqs.wysiwyg.setSettings = function(settings)
{
    ihqs.wysiwyg.customSettings = settings;
}

ihqs.wysiwyg.exception = function(message)
{
    this.name    = "ihqs - Wysiwyg Exception";
    this.message = message;
}

ihqs.wysiwyg.addStyle = function(uri)
{
    var style = document.createElement('link');
    with(style)
    {
        rel  = 'stylesheet';
        type = 'text/css';
        href = ihqs.wysiwyg.base_uri + uri;
    }
    document.body.appendChild(style);
}

ihqs.wysiwyg.addScript = function(uri, callback)
{
    var script = document.createElement('script');
    if(callback)
    {
        script.onload = callback
    }

    with(script)
    {
        type = 'text/javascript';
        src  = ihqs.wysiwyg.base_uri + uri;
    }
    document.body.appendChild(script);
}