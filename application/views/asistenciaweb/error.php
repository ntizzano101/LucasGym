<script>
Swal.fire({
    icon: "error",
    title: "Acceso no permitido",
    text: "<?= $error ?>",
    confirmButtonText: "Entendido",
    confirmButtonColor: "#d33",
    background: "#fefefe",
    color: "#333",
    iconColor: "#d33",
    showClass: {
        popup: "animate__animated animate__fadeInDown"
    },
    hideClass: {
        popup: "animate__animated animate__fadeOutUp"
    }
});
</script>
