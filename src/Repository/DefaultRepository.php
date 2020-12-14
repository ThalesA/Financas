<?php
declare(strict_types=1);

namespace SONFin\Repository;


use Illuminate\Database\Eloquent\Model;

class DefaultRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    private $modelClass;

    /**
     * @var Model
     */
    private $model;

    /**
     * DefaultRepository constructor.
     *
     * @param string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    /**
     * @param  array $data
     * @return Model|mixed
     */
    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    /**
     * @param  array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $model = $this->findInterval($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        $model = $this->findInterval($id);
        $model->delete();
    }

    protected function findInterval($id)
    {
        return is_array($id) ? $model = $this->findOneBy($id): $this->find($id);
    }

    public function find(int $id, bool $failIfNotExist = true)
    {
        return $failIfNotExist ? $this->model->findOrFail($id) : $this->model->find($id);
    }

    public function findByField(string $field, $value)
    {
        return $this->model->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->model;
        foreach ($search as $field => $value) {
            $queryBuilder = $queryBuilder->where($field, '=', $value);
        }
        return $queryBuilder->firstOrFail();
    }
}
