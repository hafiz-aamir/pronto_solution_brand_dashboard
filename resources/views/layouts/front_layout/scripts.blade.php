<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hamburgerButton = document.getElementById('hambutton');
        const sidebar = document.getElementById('sidebar');
        const body = document.body;

        // Check localStorage for sidebar state
        if (localStorage.getItem('sidebarState') === 'minimized') {
            sidebar.classList.add('minimized');
            body.classList.add('minimized-sidebar');
        }

        // Toggle sidebar state on button click
        hamburgerButton.addEventListener('click', function() {
            if (window.innerWidth > 991) { // Desktop view
                sidebar.classList.toggle('minimized');
                body.classList.toggle('minimized-sidebar');

                // Save the current state in localStorage
                if (sidebar.classList.contains('minimized')) {
                    localStorage.setItem('sidebarState', 'minimized');
                } else {
                    localStorage.removeItem('sidebarState');
                }
            } else { // Mobile view
                sidebar.classList.toggle('show');
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusButtons = document.querySelectorAll('.status-btn');
        const applyButton = document.getElementById('applyStatusBtn');
        let selectedStatuses = [];

        // Toggle button selection without closing the modal
        statusButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent the modal from closing
                const status = this.getAttribute('data-status');
                if (selectedStatuses.includes(status)) {
                    selectedStatuses = selectedStatuses.filter(s => s !== status);
                    this.classList.remove('btn-primary');
                    this.classList.add('btn-outline-primary');
                } else {
                    selectedStatuses.push(status);
                    this.classList.remove('btn-outline-primary');
                    this.classList.add('btn-primary');
                }
            });
        });

        // Apply button to close the modal and apply filters
        applyButton.addEventListener('click', function() {
            alert("Selected Statuses: " + selectedStatuses.join(', '));
            // Here you can add functionality to apply the selected filters
            // For example, closing the modal
            const modal = bootstrap.Modal.getInstance(document.querySelector('.modal'));
            modal.hide(); // Close the modal when Apply Now is clicked
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const statusButtons = document.querySelectorAll('.status-btn');
        const applyButton = document.getElementById('applyStatusBtn2');
        let selectedStatuses = [];

        // Toggle button selection without closing the modal
        statusButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent the modal from closing
                const status = this.getAttribute('data-status');
                if (selectedStatuses.includes(status)) {
                    selectedStatuses = selectedStatuses.filter(s => s !== status);
                    this.classList.remove('btn-primary');
                    this.classList.add('btn-outline-primary');
                } else {
                    selectedStatuses.push(status);
                    this.classList.remove('btn-outline-primary');
                    this.classList.add('btn-primary');
                }
            });
        });

        // Apply button to close the modal and apply filters
        applyButton.addEventListener('click', function() {
            alert("Selected Statuses: " + selectedStatuses.join(', '));
            // Here you can add functionality to apply the selected filters
            // For example, closing the modal
            const modal = bootstrap.Modal.getInstance(document.querySelector('.modal'));
            modal.hide(); // Close the modal when Apply Now is clicked
        });
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    
    // Set the options that I want
    toastr.options = {
    "closeButton": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear", 
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }

</script>

@if(Session::has('message'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.success("{{ Session::get('message') }}");
    
    });
</script>
@elseif(Session::has('error'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.error("{{ Session::get('error') }}");
    
    });
</script>
@endif


<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "-- Select Brand --", // Placeholder text
            allowClear: true // Option to clear the selection
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.select1').select2({
            placeholder: "-- No brand yet --", // Placeholder text
            allowClear: false // Option to clear the selection
        });
    });
</script>