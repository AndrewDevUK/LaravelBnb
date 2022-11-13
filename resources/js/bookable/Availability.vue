<template>
    <div>
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Check Availability
            <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
            <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
        </h6>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="from" class="text-secondary">From</label>
                <input
                    type="date"
                    name="from"
                    class="form-control form-control-sm"
                    placeholder="Start date"
                    v-model="from"
                    @keyup.enter="check"
                    :class="[{'is-invalid': this.errorFor('from')}]"
                />
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('from')" :key="'from' + index">
                    {{ error }}
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="to" class="text-secondary">To</label>
                <input
                    type="date"
                    name="to"
                    class="form-control form-control-sm"
                    placeholder="End date"
                    v-model="to"
                    @keyup.enter="check"
                    :class="[{'is-invalid': this.errorFor('to')}]"
                />
                <div class="invalid-feedback" v-for="(error, index) in this.errorFor('to')" :key="'to' + index">
                    {{ error }}
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-secondary" @click="check" :disabled="loading">Check</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Availability",
    data(){
        return {
            from: new Date().toISOString().slice(0, 10),
            to: null,
            loading: false,
            status: null,
            errors: null,
        }
    },
    methods: {
        check() {
            this.loading = true;
            this.errors = null;

            axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`
            ).then(response => {
                this.status = response.status;
            }).catch(error => {
                if(422 === error.response.status) {
                    this.errors = error.response.data.errors;
                }
                this.status = error.response.status;
            }).then(() => this.loading = false);
        },
        errorFor(field) {
          return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        },
    },
    computed: {
      hasErrors() {
        return 422 === this.status && this.errors != null;
      },
      hasAvailability() {
        return 200 === this.status;
      },
      noAvailability() {
          return 404 === this.status;
      }
    },
}
</script>

<style scoped>
    label {
        font-size: 0.7rem;
        text-transform: uppercase;
        font-weight: bolder;
    }
</style>
