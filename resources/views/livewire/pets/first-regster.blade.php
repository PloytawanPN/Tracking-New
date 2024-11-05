<div>
    <div class="card-form">
        <label class="header">Pet Information</label>
        <input type="file" id="imageInput" accept="image/*" required style="display: none;">
        <div id="preview_image" class="frame-preview">
            <i class='bx bx-image-alt'></i>
            <img id="preview" class="preview-image ">
        </div>
        <div class="input-group">
            <label>Pet Name</label>
            <input type="text" class="input-field" placeholder="Please enter pet name">
        </div>
        <div class="input-group mt-1">
            <label>Species</label>
            <select wire:model.live='species' class="input-field">
                <option value="" selected>Please Select</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
                <option value="other">Other</option>
            </select>
            @if ($species == 'other')
                <input type="text" class="input-field mt-1" placeholder="Please enter species">
            @endif
        </div>
        <div class="input-group mt-1">
            <label>Breed</label>
            <input type="text" class="input-field" placeholder="Please enter pet breed">
        </div>
        <div class="input-group mt-1">
            <label>Gender</label>
            <input type="text" class="input-field" placeholder="Please enter gender">
        </div>
        <div class="input-group mt-1">
            <label>Birthdate</label>
            <input type="date" class="input-field" placeholder="Please select birthday">
        </div>
        <div class="input-group mt-1">
            <label>Color/Markings</label>
            <input type="text" class="input-field" placeholder="Please enter color or marking">
        </div>
        <div class="input-group mt-1">
            <label>Home Map Link</label >
            <input type="text" class="input-field" placeholder="Please enter home link">
        </div>
        <div class="input-group mt-1">
            <label>Microchip ID (if applicable)</label>
            <input type="text" class="input-field" placeholder="Please enter Microchip ID">
        </div>
        <div class="button-class">
            <button>Next</button>
        </div>
    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImage = document.getElementById('preview');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('preview_image').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });

        document.getElementById('imageForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Image submitted! (but not really)');
        });
    </script>
</div>
