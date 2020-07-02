function MediaPlayer(config){
    this.media=config.el//media pasa a ser el elemento video
    this.plugins=config.plugins || [];

    this._initPlugins();
  }
  
  MediaPlayer.prototype._initPlugins=function(){
    this.plugins.forEach(plugin => {
      plugin.run(this)
    });
  }

  MediaPlayer.prototype.play=function(){
    this.media.play()
  }
  
  MediaPlayer.prototype.pause=function(){
    this.media.pause()
  }
  
  MediaPlayer.prototype.isPaused=function(){
    return this.media.paused;//get del paused
  }

  MediaPlayer.prototype.mute=function(){
    this.media.muted=true;
  }

  MediaPlayer.prototype.isMuted=function(){
    return this.media.muted;
  }

  MediaPlayer.prototype.unMute=function(){
    this.media.muted=false;
  }


  export default MediaPlayer