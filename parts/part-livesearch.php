							<form id="live-search" action="" class="ui form" method="post">
								<div class="input-group" role="search" aria-label="live search filter">
									<label class="inline fields"><strong>Search Filters: Type the name of the active contract below.</strong></label>
    							<input type="text" class="form-control" id="filter" placeholder="Type Active Contract Name..." name="Search Term" required aria-label="filter">
    							<input class="sr-only" type="submit" value="search">
    							<span id="filter-count" class="input-group-addon"></span>
                </div>
							</form>

            <script>
            jQuery(document).ready(function() {

            	jQuery("#filter").keyup(function(){

            		// Retrieve the input field text and reset the count to zero
            		var filter = jQuery(this).val(), count = 0;

            		// Loop through the comment list
            		jQuery(".live-filter").each(function(){

            			// If the list item does not contain the text phrase fade it out
            			if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
            				jQuery(this).fadeOut();

            			// Show the list item if the phrase matches and increase the count by 1
            			} else {
            				jQuery(this).show();
            				count++;
            			}
            		});

            		// Update the count
            		var numberItems = count;
            		jQuery("#filter-count").text( count+" matches");
            		//jQuery("#filter-count").text(count);
            	});

            });

            // PREVENT PRESSING RETURN FOR RESULTS
    	      $('#live-search').submit(function(e) {
               if (!$('#filter').val()) {
                   e.preventDefault();
               }
            });

            </script>
