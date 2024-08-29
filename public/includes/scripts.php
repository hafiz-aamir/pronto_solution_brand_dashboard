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