<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>
<script>
    $('input[type="file"]').on('change',function(){
        var fileName = $(this).val().split('\\');
        fileName = fileName[fileName.length-1]
        $(this).next('.custom-file-label').html(fileName);
    })
    function updateName(allParents) {
        for (let i = 0; i < allParents.length; i++) {
            const element = allParents[i];
            const parentInputs = $(element).find('input, select')
            for (let j = 0; j < parentInputs.length; j++) {
                const input = parentInputs[j];
                $(input).attr('name', `${$(input).data('name')}-${i}`)
            }
            console.log(allParents)
        }
    }
    $('.dynamic-element-add').on("click", function (ev) {
        //console.log(ev.parents())
        //$( "#target" ).trigger( "click" );
        const parent = $(ev.target).parents('.dynamic-element-parent')
        const name = parent.data('name')
        const count = $(ev.target).data('count')
        const clone = parent.clone(true, true)
        const btnDel = clone.find('.dynamic-element-delete')
        const inputs = clone.find('input')
        for (let i = 0; i < inputs.length; i++) {
            const element = inputs[i];
            $(element).val('')
        }
        btnDel.show()
        clone.insertAfter(parent)
        $(count).val(parseInt($(count).val())+1)
        const allParents = $(`.dynamic-element-parent[data-name="${name}"]`)
    });
    $('.dynamic-element-delete').on("click", function (ev) {
        const parent = $(ev.target).parents('.dynamic-element-parent')
        const count = $(ev.target).data('count')
        $(count).val(parseInt($(count).val())-1)
        parent.remove()
    });
</script>