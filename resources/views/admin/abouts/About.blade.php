@include('admin.abouts.AboutGallery')
@include('admin.abouts.ResultsAchieved')

<script>
    class About extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
            this.image_back = {};
        }

        after(form) {

        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get image_back() {
            return this._image_back;
        }

        set image_back(value) {
            this._image_back = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
            if (this.image_back) this.image_back.clear();
        }

        get galleries() {
            return this._galleries || [];
        }

        set galleries(value) {
            this._galleries = (value || []).map(val => new AboutGallery(val, this));
        }

        addGallery(gallery) {
            if (!this._galleries) this._galleries = [];
            let new_gallery = new AboutGallery(gallery, this);
            this._galleries.push(new_gallery);
            return new_gallery;
        }

        removeGallery(index) {
            this._galleries.splice(index, 1);
        }

        addResult() {
            if (!this._results) this._results = [];
            let new_result = new Result(null, this);
            this._results.push(new_result);
            return new_result;
        }

        removeResult(index) {
            this._results.splice(index, 1);
        }

        get results() {
            return this._results || [];
        }

        set results(value) {
            this._results = (value || []).map(val => new Result(val, this));
        }

        get submit_data() {
            let data = {
                title_1: this.title_1,
                title_2: this.title_2,
                intro_text: this.intro_text,
                body_text: this.body_text,
                results: this.results.map(result => result.submit_data),
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;
            if (image) data.append('image', image);

            this.galleries.forEach((g, i) => {
                if (g.id) data.append(`galleries[${i}][id]`, g.id);
                let gallery = g.image.submit_data;
                if (gallery) data.append(`galleries[${i}][image]`, gallery);
                else data.append(`galleries[${i}][image_obj]`, g.id);
            })

            return data;
        }
    }
</script>
