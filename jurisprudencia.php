function paginar(tbl,cantidad) {
  $('#' + tbl).each(function() {
    var currentPage = 0;
    var numPerPage = (cantidad) ? cantidad : 15;
    var $table = $(this);
    $table.attr('curPa',currentPage);
    $table.attr('cantidad',numPerPage);
    $table.bind('repaginate', function() {
      currentPage=$(this).attr('curPa') * 1;
      $(this).find('tbody > tr').show().slice(0,(currentPage * numPerPage)).hide().end()
       .slice((((currentPage + 1) * numPerPage) )).hide().end();
      $(this).attr('curPa',currentPage);
    });
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
      $('<span class="page-number">' + (page + 1) + '</span>').bind('click', {'newPage': page}, function(event) {
         currentPage = event.data['newPage'];
         $table.attr('curPa',currentPage).trigger('repaginate');
         $(this).addClass('active').siblings().removeClass('active');
       }).appendTo($pager).addClass('clickable');
    }
    $pager.find('span.page-number:first').addClass('active');
    $pager.insertBefore($table);
    $table.trigger('repaginate');
  });
}