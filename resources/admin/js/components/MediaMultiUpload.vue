<template>
    <div class="container">
        <h3>Multiple Media Upload</h3>
        <div class="progress" style="height: 40px">
            <div class="progress-bar" role="progressbar" :style="{ width: fileProgress + '%'}">{{ fileCurrent }}</div>
        </div>
        <hr>
        <input type="file" name="media" multiple="" @change="fileInputChange">
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h4 class="test-center">Queue files {{ fileOrder.length }}</h4>
                <ul class="list-group">
                    <li class="list-group-item" v-for="file in fileOrder">
                        {{ file.name }} : {{ file.type }}
                    </li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h4 class="test-center">Uploaded files {{ filesFinish.length }}</h4>
                <ul class="list-group">
                    <li class="list-group-item" v-for="file in filesFinish">
                        {{ file.name }} : {{ file.type }}
                    </li>
                </ul>
            </div>
            <input type="hidden" name="mediaUploaded[]" :value=mediaUploaded>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fileOrder: [],
                filesFinish: [],
                fileProgress: 0,
                fileCurrent: '',
                mediaUploaded: [],
            }
        },
        methods: {
            async fileInputChange() {
                let files = Array.from(event.target.files);
                this.fileOrder = files.slice();
                for (let item of files) {
                    await this.uploadFile(item);
                }
            },
            async uploadFile(item) {
                let form = new FormData();
                form.append('media', item);

                await axios.post('/backend/media', form, {
                    onUploadProgress: (itemUpload) => {
                        this.fileProgress = Math.round((itemUpload.loaded / itemUpload.total) * 100);
                        this.fileCurrent = item.name + ' ' + this.fileProgress;
                    }
                })
                    .then(response => {
                    this.fileProgress = 0;
                    this.fileCurrent = '';
                    this.filesFinish.push(item);
                    this.fileOrder.splice(item, 1);
                    this.mediaUploaded.push(response.data());
                })
                    .catch(error => {
                        console.log(error);
                    })
            }
        }
    }
</script>
