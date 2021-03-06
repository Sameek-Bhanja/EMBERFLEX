<?php 
class PreviewProvider {

    private $con, $username;

    public function __construct($con, $username) {
        $this->con = $con;
        $this->username = $username;
    }

    public function createCategoryPrivewVideo($categoryId) {
        $entitiesArray = EntityProvider::getEntities($this->con, $categoryId, 1);

        if(sizeof($entitiesArray) == 0) {
            ErrorMessage::show("No TV Shows to display");
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }

    public function createTVShowsPrivewVideo() {
        $entitiesArray = EntityProvider::getTVShowsEntities($this->con, null, 1);

        if(sizeof($entitiesArray) == 0) {
            ErrorMessage::show("No TV Shows to display");
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    }   

    public function createMoviesPrivewVideo() {
        $entitiesArray = EntityProvider::getMoviesEntities($this->con, null, 1);

        if(sizeof($entitiesArray) == 0) {
            ErrorMessage::show("No Movies to display");
        }

        return $this->createPreviewVideo($entitiesArray[0]);
    } 
    
    public function createPreviewVideo($entity) {
        
        if($entity == null) {
            $entity = $this->getRandomEntity();
        }

        $id = $entity->getId();
        $name = $entity->getName();
        $preview = $entity->getPreview();
        $thumbnail = $entity->getThumbnail();

        $videoId = VideoProvider::getEntityVideoForUser($this->con, $id, $this->username);
        $video = new Videos($this->con, $videoId);

        $inProgress = $video->isInProgress($this->username);
        $playbuttonText = $inProgress  ? "Resume Playing" : "Play";

        $seasonEpisode = $video->getSeasonAndEpisode();
        $subheading = $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";

        return "<div class='previewContainer'>

                    <img src='$thumbnail' class='previewImage' hidden>

                    <video autoplay muted class='previewVideo' onended='previewEnded()'>
                        <source src='$preview' type='video/mp4'>
                    </video>

                    <div class='previewOverlay'>

                        <div class='mainDetails'>
                            <h3>$name<h3>
                            $subheading
                            <div class='buttons'>
                                <button onclick='watchVideo($videoId)'><i class='fas fa-play'></i>  $playbuttonText</button>
                                <button onclick='volumeToggle(this)'><i class='fas fa-volume-mute'></i></button>
                            </div>

                        </div>

                    </div>
        
                </div>";

    }

    public function createEntityProviserSquare($entity) {
        $id = $entity->getId();
        $thumbnail = $entity->getThumbnail();
        $name = $entity->getName();

        return "<a href='entity.php?id=$id'>
                    <div class='previewContainer small'>
                        <img src='$thumbnail' title='$name'>
                    </div>
                </a>";
    }

    private function getRandomEntity() {

       $entity = EntityProvider::getEntities($this->con, null, 1);
       return $entity[0]; 
    
    }

}
?>