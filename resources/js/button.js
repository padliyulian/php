// delete button confirm
document.querySelectorAll(".js-form__delete").forEach((el) => {
    el.addEventListener("submit", (ev) => {
        ev.preventDefault();
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ),
                setTimeout(() => ev.target.submit(), 2000);
            }
        })
    });
});


// del team button
$('body').on('click', '.js-team-delete', function () {
    let team = $(this).prev().val();
    $('.js-team').each(function() {
        if($(this).val() == team) {
            $(this).attr('disabled', false);
        }
    });

    let oldTeams = $('.js-teams_id').val();
    let oldTeamsArr = oldTeams.split(',');
    let newTeam = [];
    let newTeams = '';
    oldTeamsArr.map(item => item != team && newTeam.push(item));
    newTeams = newTeam.toString();
    $('.js-teams_id').val(newTeams)

    $(this).parentsUntil('.js-teams').remove();
});

// add team button
$('.js-team').on('click', function(){
    $('.js-teams').append('<li><input type="hidden" value="'+$(this).val()+'">'+$(this).text()+' - <span class="text-danger js-team-delete" style="cursor: pointer;">delete</span></li>');
    $(this).attr('disabled', true);
    let x = parseInt($(this).val());
    
    if ($('.js-teams_id').val()) {
        $('.js-teams_id').val(function(i, oldval) {
            return `${oldval},${x}`;
        });
    } else {
        getTeamId.addTeam(parseInt($(this).val()));
        $('.js-teams_id').val(getTeamId.value());
    }
});

// closure var teamId
let getTeamId = (function() {
    let teamId = [];
    function addVal(val) {
        teamId.push(val);
    }
    return {
        addTeam: function($id) {
            addVal($id);
        },
        value: function() {
            return teamId;
        }
    };
})();