jQuery().ready( function($) {
  // Check all categories by default if ALL Categories is selected
  var cats = $('input[name=cats]').val();
  if (cats !== '') {
    cats = cats.split(',');
    for (var i = cats.length - 1; i >= 0; i--) {
      if (cats[i] === 'all-cat') {
        $('input#category-all-cat').prop('checked', true);
        $('input[:checkbox"]').prop('checked', true);
      } else if (parseInt(cats[i])) {
        $('input#in-category-' + cats[i]).prop('checked', true);
      }
    }
  } else { // No mavenvx categories stored. Probably 1st time use.
    $('input#category-all-cat').prop('checked', true);
    $('input:checkbox').prop('checked', true);
  }

  $('input#category-all-cat').change(function() {
     $('input:checkbox').prop('checked', this.checked);
  });

  // If any category is deselected then we can't select all categories
  $('input[id*="in-category"]').change(function() {
    if (this.checked === false) {
      $('input#category-all-cat').prop('checked', false);
    }
  });

  console.log('MavenVX Admin JS loaded successfully');
});
