<?php

namespace App\Music;

use App\Music\MusicGateway;

class SpotifyMusicGateway implements MusicGateway
{
    public function getArtistTopTracks($artistId) {
        return true;
    }

    public function createPlaylist($name) {
        return rand(1, 100);
    }

    public function addItemsToPlaylist($playlistId, $items) {
        return true;
    }

    public function deletePlaylist($playListId) {
        return true;
    }

    public function playPlaylist($playListId) {
        return true;
    }
}
