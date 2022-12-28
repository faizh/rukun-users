<template>
  <div class="container">
    <navbar-component />
    <div class="text-center">
      <h4>Here is Your Data</h4>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table width="100%">
          <tr>
            <td>
              <h6>Name</h6>
            </td>
            <td>
              <b-input-group>
                <b-form-input
                  :disabled="!updates.name"
                  v-model="users.name"
                ></b-form-input>
              </b-input-group>
            </td>
            <td>
              <b-button
                v-if="!updates.name"
                @click="setUpdateName(true)"
                class="btn btn-sm ml-1"
                variant="outline-dark"
                ><b-icon icon="pen"></b-icon
              ></b-button>
              <b-button
                v-if="updates.name"
                @click="setUpdateName(false)"
                class="btn btn-sm ml-1"
                variant="success"
                ><b-icon icon="check2"></b-icon
              ></b-button>
            </td>
          </tr>

          <tr>
            <td>
              <h6>Email</h6>
            </td>
            <td>
              <b-input-group>
                <b-form-input
                  :disabled="!updates.email"
                  v-model="users.email"
                ></b-form-input>
              </b-input-group>
            </td>
            <td>
              <b-button
                v-if="!updates.email"
                @click="setUpdateEmail(true)"
                class="btn btn-sm ml-1"
                variant="outline-dark"
                ><b-icon icon="pen"></b-icon
              ></b-button>
              <b-button
                v-if="updates.email"
                @click="setUpdateEmail(false)"
                class="btn btn-sm ml-1"
                variant="success"
                ><b-icon icon="check2"></b-icon
              ></b-button>
            </td>
          </tr>

          <tr>
            <td>
              <h6>Phone Number</h6>
            </td>
            <td>
              <b-input-group>
                <b-form-input
                  :disabled="!updates.phoneNumber"
                  v-model="users.phoneNumber"
                ></b-form-input>
              </b-input-group>
            </td>
            <td>
              <b-button
                v-if="!updates.phoneNumber"
                @click="setUpdatePhoneNumber(true)"
                class="btn btn-sm ml-1"
                variant="outline-dark"
                ><b-icon icon="pen"></b-icon
              ></b-button>
              <b-button
                v-if="updates.phoneNumber"
                @click="setUpdatePhoneNumber(false)"
                class="btn btn-sm ml-1"
                variant="success"
                ><b-icon icon="check2"></b-icon
              ></b-button>
            </td>
          </tr>

          <tr>
            <td>
              <h6>Address</h6>
            </td>
            <td>
              <b-input-group>
                <b-form-textarea
                  id="textarea-small"
                  size="sm"
                  placeholder="Small textarea"
                  v-model="users.address"
                  :disabled="!updates.address"
                ></b-form-textarea>
              </b-input-group>
            </td>
            <td>
              <b-button
                v-if="!updates.address"
                @click="setUpdateAddress(true)"
                class="btn btn-sm ml-1"
                variant="outline-dark"
                ><b-icon icon="pen"></b-icon
              ></b-button>
              <b-button
                v-if="updates.address"
                @click="setUpdateAddress(false)"
                class="btn btn-sm ml-1"
                variant="success"
                ><b-icon icon="check2"></b-icon
              ></b-button>
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <b-button
                v-if="
                  updates.name ||
                  updates.email ||
                  updates.phoneNumber ||
                  updates.address
                "
                @click="setUpdateAll"
                class="btn ml-1"
                variant="success"
                ><b-icon icon="check-all"></b-icon> Update All</b-button
              >
            </td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped>
table {
  border-collapse: separate;
  border-spacing: 0 1em;
}
</style>

<script>
export default {
  data() {
    return {
      users: {
        name: "Faiz Hermawan",
        email: "faizhermawan13@gmail.com",
        phoneNumber: 85247914964,
        address: "Tomang, Jakarta Barat",
      },
      updates: {
        name: false,
        email: false,
        phoneNumber: false,
        address: false,
      },
    };
  },

  methods: {
    setUpdateName(bool) {
      this.updates.name = bool;
    },

    setUpdateEmail(bool) {
      this.updates.email = bool;
    },

    setUpdatePhoneNumber(bool) {
      this.updates.phoneNumber = bool;
    },

    setUpdateAddress(bool) {
      this.updates.address = bool;
    },

    setUpdateAll() {
      this.updates.name = false;
      this.updates.email = false;
      this.updates.phoneNumber = false;
      this.updates.address = false;
    },
  },
};
</script>