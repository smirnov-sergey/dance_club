<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.09.2019
 * Time: 22:39
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Club extends ActiveRecord
{
    // Музыка играет (плейлист вкл\откл)
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static function tableName()
    {
        return 'club';
    }

    public function getPlaylist()
    {
        return $this->hasOne(Playlist::class, ['id' => 'playlist_id']);
    }

    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['club_id' => 'id']);
    }

    //Для связи c Company, через таблицу Visitor
    public function getCompany()
    {
        return $this->hasMany(Company::class, ['id' => 'company_id'])
            ->viaTable(Visitor::tableName(), ['club_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['playlist_id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
            // ['status', 'default', 'value' => self::STATUS_INACTIVE],
            // ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Выберите клуб',
            'name' => 'Название клуба',
            'playlist_id' => 'Выбрать плейлист',
        ];
    }

    //для выпадающего списка в форме заполнения Visitor
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    // поиск всех клубов
    public function findClubs()
    {
        return Club::find()->with('visitor', 'playlist', 'company')->all();
    }

    // поиск всех треков
    public function findTracks($id)
    {
        return Club::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name'])
            ->innerJoin(Playlist::tableName(), 'playlist.id = club.playlist_id')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Genre::tableName(), 'track.genre_id = genre.id')
            ->where(['club.id' => $id])
            ->asArray()
            ->all();
    }

    // поиск всех танцоров по трекам
    public function findDancers($id)
    {
        return Track::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name', 'visitorName' => 'visitor.name',
                'visitorId' => 'visitor.id', 'genreId' => 'genre.id', 'visitorGenreId' => 'visitor_genre.genre_id',
                'visitorClub' => 'visitor.club_id', 'visitorGender' => 'visitor.gender', 'trackId' => 'track.id'])
            ->innerJoin(PlaylistTrack::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Playlist::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Club::tableName(), 'club.playlist_id = playlist.id')
            ->leftJoin(VisitorGenre::tableName(), 'visitor_genre.genre_id = track.genre_id')
            ->innerJoin(Genre::tableName(), 'genre.id = track.genre_id')
            ->leftJoin(Visitor::tableName(), [
                'and',
                'visitor.id = visitor_genre.visitor_id',
                'visitor.club_id = club.id'
            ])
            ->where(['club.id' => $id])
            ->asArray()
            ->all();
    }

    // TODO создать пары, если жанр музыки romance
    // группировка посетитетелей по трекам
    public function findDancersTracks($id)
    {
        $dancers = $this->findDancers($id);

        foreach ($dancers as $track) {
            $tracks[$track['trackName']][] = $track['visitorName'];
        }

        return $tracks;
    }

    // TODO: доделать запросы, для защиты от SQL инъекций, проверка существования id
    // выходит посетитель из клуба
    public function exitVisitor($visitor_id)
    {
        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id SET visitor.company_id =:companyNull, visitor.club_id =:clubNull WHERE visitor.id =:id;")
            ->bindValue(':id', $visitor_id)
            ->bindValue(':companyNull', NULL)
            ->bindValue(':clubNull', NULL)
            ->execute();
    }

    // выходит группа из клуба
    public function exitCompany($company_id)
    {
        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id INNER JOIN company ON visitor.company_id = company.id SET visitor.company_id =:companyNull, visitor.club_id =:clubNull WHERE company.id =:id;")
            ->bindValue(':id', $company_id)
            ->bindValue(':companyNull', NULL)
            ->bindValue(':clubNull', NULL)
            ->execute();
    }
}