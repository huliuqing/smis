<template>
  <div class="modal fade" v-bind:class="show ? 'show' : ''"
       id="exampleModalScrollable" tabindex="-1"
       aria-labelledby="exampleModalScrollableTitle"
       v-bind:style="show ? 'display: block;' : 'display: none;'"
       aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle" v-if="currentChatUser">与 {{ currentChatUser.name }}
            聊天</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="toggle">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="container-fluid" id="message-content" style="min-height: 300px; border-left: 4px solid #04AA6D">
            <div class="row col-md-12">
              <span class="message-income">
                <div class="alert alert-dark"><span>收到消息示例</span></div>
              </span>
            </div>

            <div class="row col-md-12 justify-content-end">
              <span class="message-outcome">
                <div class="alert alert-info"><span>发送消息示例</span></div>
              </span>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <form class="col-md-12">
            <div class="form-group">
              <textarea class="form-control"
                        id="typeInMessage"
                        rows="3"
                        placeholder="请输入信息"
                        v-model="messageContent">
                {{ messageContent }}
              </textarea>
            </div>
            <button type="button" class="btn btn-primary float-right" @click.prevent="send">发送</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import api from "../../../assets/js/const/api";
import notify from "../../../assets/js/utils/notify";
import config from "../../../assets/js/const/config";

const messageRecvIdent = '[[recv]]'
const messageSendIdent = '[[send]]'
export default {
  name: "chat-box",
  data() {
    return {
      listens: [],
      hasWatched: false,
      testUser: {
        id: 7,
      },
      mockSendMessageIdent: messageSendIdent,// or messageRecvIdent
      currentChatUser: null,
      show: false,
      messageContent: '',
    }
  },

  mounted() {
    this.watchChat()
  },

  methods: {
    chatWith: function (user) {
      this.toggle()

      if (user != this.currentChatUser) {
        this.resetChatElement()
      }

      this.currentChatUser = user ? user : this.testUser
    },

    toggle: function () {
      this.show = !this.show
    },

    watchChat: function () {
      if (this.hasWatched) {
        return
      }

      this.hasWatched = true
      let auth = JSON.parse(sessionStorage.getItem('user'))

      console.log(`CheckBox[watchChat] user[${auth}]`)

      let channel = config.pusher.chat.channel + auth.id
      let listenEvent = config.pusher.chat.event

      console.log(`CheckBox[watchChat] channel[${channel}], event[${listenEvent}]`)
      Echo.channel(channel)
          .listen(listenEvent, (e) => {
            console.log(`CheckBox[watchChat] receive message[${e}]`)
            this.insertChatElement(e.message.message, messageRecvIdent)
          })
    },

    send: function () {
      this.messageContent = this.messageContent.trim()

      if (this.messageContent.length === 0) {
        notify.danger(this.$notifications, '发送消息不能为空')
        return
      }
      let parts = this.messageContent.split(':')
      console.log(parts)
      if (parts.length >= 2) {
        this.mockSendMessageIdent = parts[0]
        this.messageContent = parts[1]
      }

      let messageJson = {
        to: this.currentChatUser.id,
        message: this.messageContent,
      }

      let url = api.getRequestUrl('chat')
      axios.post(url, messageJson)
          .then((response) => {
            console.log(response);
            if (response.status === 200) {
              if (response.data.message !== undefined) {
                console.log('resp message: ', response.data.message)
                return
              }
              this.insertChatElement(this.messageContent, this.mockSendMessageIdent)
              this.messageContent = ''
            } else {
            }
          })
          .catch((error) => {
            notify.danger(this.$notifications, '消息发送失败')
          });

      return []
    },

    resetChatElement: function () {
      let messageContentElem = document.getElementById('message-content')
      messageContentElem.innerHTML = ''
    },

    insertChatElement: function (message, isIncomeMessage) {
      let newMessageElem = this.buildChatMessageElemHtml(message, isIncomeMessage)
      let messageContentElem = document.getElementById('message-content')
      messageContentElem.innerHTML = messageContentElem.innerHTML + newMessageElem
    },

    buildChatMessageElemHtml: function (message, isIncomeMessage) {
      let cssClass = isIncomeMessage === messageSendIdent ? 'justify-content-end' : ''
      let alertClass = isIncomeMessage === messageSendIdent ? 'alert-info' : 'alert-dark'

      return `<div class="row col-md-12 ${cssClass}">
                <span class="message-outcome">
                  <div class="alert ${alertClass}"><span>${message}</span></div>
                </span>
              </div>`
    },

  }
}
</script>

<style>

</style>