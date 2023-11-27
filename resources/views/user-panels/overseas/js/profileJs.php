<script>
    function addDoc(name) {
        $('#doc_type').text(name)
        $('#type').val(name)
        $("#save_doc_modal").modal("show");
    }
</script>