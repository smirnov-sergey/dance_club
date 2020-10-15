<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;


/**
 *
 * @property-read mixed $playlist
 * @property-read mixed $company
 * @property-read mixed $visitor
 */
class Club extends ActiveRecord
{
    /** Музыка играет (плейлист вкл\откл) */
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;

    public static function tableName()
    {
        return 'club';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['playlist_id'], 'safe'],
            [['name'], 'string', 'min' => 3, 'max' => 255],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaylist()
    {
        return $this->hasOne(Playlist::class, ['id' => 'playlist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitor()
    {
        return $this->hasMany(Visitor::class, ['club_id' => 'id']);
    }

    /**
     * Для связи c Company, через таблицу Visitor
     *
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getCompany()
    {
        return $this->hasMany(Company::class, ['id' => 'company_id'])
            ->viaTable(Visitor::tableName(), ['club_id' => 'id']);
    }


    /**
     * для выпадающего списка в форме заполнения Visitor
     *
     * @return array
     */
    public static function getDropDown()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function findClubs()
    {
        return self::find()
            ->with('visitor', 'playlist', 'company')
            ->all();
    }

    /**
     * поиск всех треков
     *
     * @param $id
     * @return array|ActiveRecord[]
     */
    public function findTracks($id)
    {
        return self::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name'])
            ->innerJoin(Playlist::tableName(), 'playlist.id = club.playlist_id')
            ->innerJoin(PlaylistTrack::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(Track::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Genre::tableName(), 'track.genre_id = genre.id')
            ->where(['club.id' => $id])
            ->asArray()
            ->all();
    }


    /**
     * поиск всех танцоров по трекам
     *
     * @param $id
     * @return array|ActiveRecord[]
     */
    public function findDancers($id)
    {
        return Track::find()
            ->select(['trackName' => 'track.name', 'genreName' => 'genre.name', 'visitorName' => 'visitor.name',
                'visitorId' => 'visitor.id', 'genreId' => 'genre.id', 'visitorGenreId' => 'visitor_genre.genre_id',
                'visitorClub' => 'visitor.club_id', 'visitorGender' => 'visitor.gender', 'trackId' => 'track.id'])
            ->innerJoin(PlaylistTrack::tableName(), 'playlist_track.track_id = track.id')
            ->innerJoin(Playlist::tableName(), 'playlist.id = playlist_track.playlist_id')
            ->innerJoin(self::tableName(), 'club.playlist_id = playlist.id')
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

    /**
     *  группировка посетителей по трекам
     *
     * @param $id
     * @return mixed
     */
    // @TODO создать пары, если жанр музыки romance
    public function findDancersTracks($id)
    {
        $dancers = $this->findDancers($id);

        foreach ($dancers as $track) {
            $tracks[$track['trackName']][] = $track['visitorName'];
        }

        /** @var $tracks */
        return $tracks;
    }

    /**
     * выходит посетитель из клуба
     *
     * @param $visitor_id
     * @throws \yii\db\Exception
     */
    // @TODO: доделать запросы, для защиты от SQL инъекций, проверка существования id
    public function exitVisitor($visitor_id)
    {
        Yii::$app->db->createCommand(
            "UPDATE visitor JOIN club ON club.id = visitor.club_id SET visitor.company_id =:companyNull, visitor.club_id =:clubNull WHERE visitor.id =:id;")
            ->bindValue(':id', $visitor_id)
            ->bindValue(':companyNull', NULL)
            ->bindValue(':clubNull', NULL)
            ->execute();
    }


    /**
     * выходит группа из клуба
     *
     * @param $company_id
     * @throws \yii\db\Exception
     */
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