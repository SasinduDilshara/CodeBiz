<?php $this->setSiteTitle("Add Advertisements"); ?>
<?php $this->start('body'); ?>

<div class = "card border-primary mb-3" style="max-width: 30rem; margin:auto; top:5rem;">
	<div class="card-header" style="text-align: center"> Add Advertisement </div>
	<div class="card-body">
		<?php $this->partial('advertisements','form') ?>
	</div>
</div>

<script>
    // function to get city names
    $(document).ready(function(){
        $.ajaxSetup({ cache: false });
        $('#area').keyup(function(){
            $('#result').html('');
            $('#state').val('');
            var searchField = $('#area').val();
            var expression = new RegExp(searchField, "i");
            $.getJSON('<?=PROOT?>app/cities.json', function(data) {
                var x = 0;
                $.each(data, function(key, value){    
                    if (value.name.search(expression) != -1)
                    {
                    $('#result').append('<li class="dropdown-item">'+value.name+'</li>');
                    x++;
                    }
                    // max number of items displayed
                    if (x == 5)
                    {
                        return false;
                    }
            });   
        });
    });
    
    $('#result').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
            $('#area').val($.trim(click_text[0]));
            $("#result").html('');
        });
    });
</script>

<?php $this->end(); ?>