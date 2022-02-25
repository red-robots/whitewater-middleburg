tinymce.PluginManager.add('zz_tc_button', function( editor, url ) {
  editor.addButton( 'zz_tc_button', {
    text: "ZZ Button",
    title: "Insert Button",
    image: 'https://bellaworksweb.com/wp-content/themes/bellaworks-2019-v2/favicons/favicon-16x16.png',
    onclick: function() {
      editor.windowManager.open( {
        title: 'Insert Button',
        width: 500,
        height: 300,
        body: [
        {
          type: 'textbox',
          name: 'url',
          label: 'URL'
        },
        {
          type: 'textbox',
          name: 'label',
          label: 'Link Text'
        },
        {
          type: 'checkbox',
          name: 'newtab',
          label: ' ',
          text: 'Open link in new tab',
          checked: true
        },
        {
          type: 'listbox',
          name: 'style',
          label: 'Button Style',
          'values': [
            { text: "Primary", value: "default" },
            { text: "Secondary", value: "secondary" },
            { text: "Disabled", value: "disabled" }
          ]
        }],
        onsubmit: function( e ) {
          let $content = '<a href="' + e.data.url + '" class="btn' + (e.data.style !== 'default' ? ' ' + e.data.style : '') + '"' + (!!e.data.newtab ? ' target="_blank"' : '' ) + '>' + e.data.label + '</a>';
          editor.insertContent( $content );
        }
      });
    }
  });
});