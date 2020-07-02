import MediaPlayer from './MediaPlayer.js';
import AutoPlay from '../plugins/AutoPlay.js'

const video = document.getElementById("videoInterno")
const button = document.getElementById("play")
const buttonMute=document.getElementById("mute")

const player=new MediaPlayer({el:video, plugins: [
    new AutoPlay()
]});

button.onclick=()=>{
  if(player.isPaused()){
    player.play()
  }else{
    player.pause()
  }
}

buttonMute.onclick= () => {
    if (player.isMuted()){
        player.unMute();
    }else{
        player.mute();
    }
}


