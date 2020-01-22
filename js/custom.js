$(document).ready(function(){


  var term = $('.search-result').text();
  term = term.replace(/(\s+)/,"(<[^>]+>)*$1(<[^>]+>)*");
  var pattern = new RegExp("("+term+")", "gi");
    $(".tab-content h5").each(function(){
      var src_str = $(this).html();
      src_str = src_str.replace(pattern, "<mark>$1</mark>");
      src_str = src_str.replace(/(<mark>[^<>]*)((<[^>]+>)+)([^<>]*<\/mark>)/,"$1</mark>$2<mark>$4");
      $(this).html(src_str);
    })

    $('.notifications a.dropdown-toggle').click(function(e){
      var currentToken = $('meta[name="csrf-token"]').attr('content');
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('href'),
        context: this,
        data: {_token: currentToken },
        success: function(data) {
          if(data == 'updated') {
            $(this).parent().find('.counter').text(0);
          }
        }
      })
    });

    $('.save').parents('form').submit(function(){
      $(this).find('.save').prop('disabled', true);
    });

    // $('.close, .modal-footer a').click(function(){
    //   $(this).parents('form').trigger("reset");
    //   $(this).parents('form').find('textarea').val('');
    // });

    $('body').click(function(event){
      if(!$(event.target).closest('.modal').length && !$(event.target).is('.modal') && !$(event.target).is('.remove-risk-level')) {
        $('div[class^="modal"]').find('form').trigger("reset");
        $('div[class^="modal"]').find('form').find('textarea').val('');
        $('#risk-area').empty();
        $('#edit_risk-area').empty();
      }
    });

    $('.filter-arrow').click(function(){
      $(this).parents('.filter-area').find('.toggle-container').toggleClass('active');
      $(this).toggleClass('active');
      return false;
    });

    $('.send-message').submit(function(e){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        context: this,
        success: function(data) {
          if(data === 'success') {
            var profile_img = $('.profile-img-top').attr('src');
            var message = $(this).find('.body-message').val();
            var html = `<div class="peers fxw-nw  ai-fe ">
                          <div class="peer  ord-1 mL-20  ">
                            <img class="w-2r bdrs-50p" src="${ profile_img }" title="Partner1">
                          </div>
                          <div class="peer peer-greed  ord-0 ">
                              <div class="layers   ai-fe gapY-10  ">
                                  <div class="layer">
                                      <div class="fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                          <div><span>${ message }</span></div>
                                          <div style="text-align: right ;">
                                            <small title="Sep 01 2019">Now</small>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>`;
             $('.no-remarks').remove();
             $(this).parents('.layers').find('.message-content').append(html);
             $(this).parents('.layers').find('.layer').animate({ scrollTop: $(this).parents('.layers').find('.message-content').height() }, 500);
             $(this).parent().find('textarea').val('');
           }
         }
      })
    })

    $( ".ui-slider-common" ).each(function(){
        $(this).slider({
            min: 0,
            max: 100,
            step: 25,
            value: $(this).data('val'),
            slide: function(event, ui) {
                $(this).parent().find(".task_progress").val(ui.value);
                $(this).parent().find('.slider-completed .s-f').text(ui.value);
                var text1 = '',
                    text2 = '';
                if(ui.value == 25) {
                  text1 = 'Not Adequate';
                  text2 = '25% '+text1;
                } else if (ui.value == 50) {
                  text1 = 'Very Partially';
                  text2 = '50% '+text1;
                } else if (ui.value == 75) {
                  text1 = 'Partially';
                  text2 = '75% '+text1;
                } else if (ui.value == 100) {
                  text1 = 'Largely';
                  text2 = '100% '+text1;
                }
                $(this).parent().find('.slider-completed .s-l').text(text1);
                $(this).parents('.task-list').find('.progress-sup').text(text2);
                $(this).parents('.task-list').find('.progress-bar').css('width', ui.value + '%');

                if(ui.value == 100) {
                  $(this).parents('.task-list').css('border', '2px solid green');
                } else {
                  $(this).parents('.task-list').css('border', '2px solid #ccc');
                }

                $.ajax({
                  type : 'POST',
                  url : $(this).parent().find('.task_update').attr('action'),
                  data : $(this).parent().find('.task_update').serialize(),
                  success : function(data){
                    if(data === 'error') {
                      alert('There is a problem when updating this module');
                    }
                  }
               })
            }
        });
    });

    // See more in descriptions
    $('.see-more').click(function(){
        var content  = $(this).data('content');
        var title    = $(this).data('title');
        $('#modal').find('.see-more-content').text(content);
        $('#modal').find('.see-more-title').text(title);
    });

    $('.toggle-class').click(function(e){
        e.preventDefault();
        $(this).parents('.toggle-parent').find('.toggle-area').slideToggle(200);
    });

    $('.modal-edit').click(function(){
        $(this).find('form').trigger("reset");
        $(this).find('form').find('textarea').val('');

        var edit_url   = $(this).data('edit-url'),
            action_url = $(this).data('action-url'),
            target_id  = $(this).data('target');
        $(target_id).find('form').attr('action', action_url);
        $.ajax({
          type: 'GET',
          url: edit_url,
          success: function(data){
              let keys = Object.keys(data);
              switch(target_id) {
                  case '#edit-risk-log':
                    for(var x  = 0; x < keys.length; x++) {
                     $('#edit_risk_'+keys[x]).val(data[keys[x]]);
                    }
                    let risk_level = data.risk_level.split(',');
                    console.log(risk_level);
                    var html = '';
                    for(var y = 0; y < risk_level.length; y++) {
                      html += `<div class="risk-container row mB-5">
                          <div class="col-md-2">
                              <input type="number" name="risk-year-${y}" class="form-control" min="2010" max="2100" placeholder="Year" required value="${risk_level[y].split('-')[0]}">
                          </div>
                          <div class="col-md-3">
                              <select name="risk-level-${y}" class="form-control risk-level" required>
                                  <option value="0" ${ (risk_level[y].split('-')[1] == 0) ? 'selected' : '' }>Low</option>
                                  <option value="1" ${ (risk_level[y].split('-')[1] == 1) ? 'selected' : '' }>Medium</option>
                                  <option value="2" ${ (risk_level[y].split('-')[1] == 2) ? 'selected' : '' }>High</option>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <a href="#" class="remove-risk-level">remove</a>
                          </div>
                      </div>`;
                    }
                    $('#edit_risk_risk-count').val(risk_level.length);
                    $('#edit_risk-area').append(html);
                  break;
                  case '#edit-task':
                    $('#edit_task_title').val(data.title);
                    $('#edit_task_deliverables').val(data.deliverables);
                    $('#edit_task_partner_id').val(data.partner_id);
                    $('#edit_task_fund_source').val(data.fund_source);
                    $('#edit_task_code_id').val(data.code_id);
                    $('#edit_task_unit_cost').val(data.unit_cost);
                    $('#edit_task_description').val(data.description);
                    $('#edit_unit_measurement').val(data.unit_measurement);
                    if(data.timeline) {
                      var timeline = data.timeline.split(',');
                      for(var x = 0; x < timeline.length; x++) {
                          $('#edit_task_q-'+timeline[x]).prop('checked', true);
                      }
                    }
                    if(data.month) {
                      var month = data.month.split(',');
                      for(var y = 0; y < month.length; y++) {
                        var get_month = month[y].split('-')[0];
                        var get_count = month[y].split('-')[1];
                        var get_cost = month[y].split('-')[2];
                        if(get_month.includes(get_month)) {
                          $('#edit_m-'+get_month).prop('checked', true);
                          $('#edit_n-'+get_month).val(get_count);
                          $('#edit_c-'+get_month).val(get_cost);
                        }
                      }
                    }
                    break;
                  case '#edit-outcome':
                    $('#edit_outcome_title').val(data.title);
                    $('#edit_outcome_description').val(data.description);
                    break;
                  case '#edit-output':
                    $('#edit_output_title').val(data.title);
                    $('#edit_output_description').val(data.description);
                    break;
                  case '#edit-activity':
                    $('#edit_activity_title').val(data.title);
                    $('#edit_activity_start_date').val(data.start_date);
                    $('#edit_activity_end_date').val(data.end_date);
                    $('#edit_activity_description').val(data.description);
                    $('#edit_activity_deliverables').val(data.deliverables);
                    break;
                  case '#edit-code':
                    $('#edit_code').val(data.code);
                    $('#edit_description').val(data.description);
                    break;
                  case '#edit-unit':
                    $('#edit_unit').val(data.unit);
                    $('#edit_description').val(data.description);
                    break;
                  case '#edit-progress-report':
                    for(var x  = 0; x < keys.length; x++) {
                     $('#edit_'+keys[x]).val(data[keys[x]]);
                    }
                    break;
                  case '#edit-output-indicator':
                    for(var x  = 0; x < keys.length; x++) {
                     $('#edit_output_'+keys[x]).val(data[keys[x]]);
                    }
                    break;
                  case '#edit-activity-report':
                    for(var x  = 0; x < keys.length; x++) {
                     $('#edit_pra_'+keys[x]).val(data[keys[x]]);
                    }
                    break;
              }
          }
        });
    });

    $('.t-month').click(function(){
      if( $(this).is(':checked') ) {
        $(this).next().find('input').prop('required',true);
      } else {
        $(this).parent().find('.m-sub input').removeAttr('required');
      }
    });

    $('.t-quarter').click(function(){
      if( !$(this).is(':checked') ) {
        $(this).parent().find('input').removeAttr('required');
        $(this).parent().find('input').prop('checked', false);
      }
    });

    let count = ($('#edit_risk_risk-count').val()) ? $('#edit_risk_risk-count').val() : 0;

    $('.add-risk-level').on('click', function(e){
      e.preventDefault();
      var html = `<div class="risk-container row mB-5">
                    <div class="col-md-2">
                        <input type="number" name="risk-year-${count}" class="form-control" min="2010" max="2100" placeholder="Year" required>
                    </div>
                    <div class="col-md-3">
                        <select name="risk-level-${count}" class="form-control risk-level" required>
                            <option value="0">Low</option>
                            <option value="1">Medium</option>
                            <option value="2">High</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="remove-risk-level">remove</a>
                    </div>
                </div>`;
        if( $(this).parents('#edit-risk-log').length == 1 ) {
          $('#edit_risk_risk-count').val(count+1);
          $('#edit_risk-area').append(html);
        } else {
          $('#risk-count').val(count+1);
          $('#risk-area').append(html);
        }
      count++;
    });

    $('body, html').on('click', '.remove-risk-level', function(e){
      e.preventDefault();
      $(this).parents('.risk-container').remove();
    });

    $('.modal-create').click(function(e){
      var target_id  = $(this).data('target');
      var project_id = $(this).data('project_id'),
          outcome_id = $(this).data('outcome_id'),
          output_id = $(this).data('output_id');
      switch(target_id) {
        case '#create-output-indicator':
                $('#pro_project_id').val(project_id);
                $('#pro_outcome_id').val(outcome_id);
                $('#pro_output_id').val(output_id);
        break;
        case '#create-activity-report':
              var activity_id = $(this).data('activity_id');
              $('#pra_project_id').val(project_id);
              $('#pra_outcome_id').val(outcome_id);
              $('#pra_output_id').val(output_id);
              $('#pra_activity_id').val(activity_id);
        break;
        default:
          $('#pro_project_id').val('');
          $('#pro_outcome_id').val('');
          $('#pro_output_id').val('');
        break;
      }
    });

});
