(function() {
    tinymce.PluginManager.add('harun_mce_button', function(editor, url) {
        editor.addButton('harun_mce_button', {
            icon: false,
            text: "Yoo Button",
            tooltip: "Click the Additional Link button",
            onclick: function() {
                editor.windowManager.open({
                    title: "Yoo Button",
                    body: [{
                        type: 'textbox',
                        name: 'tab1title',
                        label: 'Button Text',
                        value: 'Button'
                    },
                    {
                        type: 'textbox',
                        name: 'tab1content',
                        label: 'Button Link',
                        value: 'www'
                    },
                    {
                        type: 'textbox',
                        name: 'tab2Yborder',
                        label: 'Border Radius',
                        value: '4'
                    },
                       {
                           type: 'textbox',
                           name: 'tabLmargin',
                           label: 'Margin Left(px)',
                           value: '5'
                       },
                       {
                           type: 'textbox',
                           name: 'tabRmargin',
                           label: 'Margin Right(px)',
                           value: '2'
                       },
                    {
                        type   :'colorbox',
                        name: 'tabtextColor',
                        label: 'Button Color',
                        value: '#fff'
                    },
   
                    {
                        type   : 'colorbox',
                        name: 'tabbgColor',
                        label: 'Button Background',
                        value: '#470dd9'
                    },


                    ],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '<a href="' +
                            e.data.tab1content + 
                            '" style="margin-left:'+e.data.tabLmargin+'px;margin-right:'+e.data.tabRmargin+'px; border-radius:'+e.data.tab2Yborder+'px;color:'+e.data.tabtextColor+';background:'+e.data.tabbgColor+';display: inline-block;padding:3px 10px;" class="ybarbtneditr">' +
                            e.data.tab1title + 
                            '</a>'
                        );
                    }
                });
            }
        });
    });
})();