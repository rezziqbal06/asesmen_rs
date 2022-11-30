<?php
/**
* Load manually Supporter class for data modelling
*/
require_once(SEMEROOT.'app/core/seme_column.php');
require_once(SEMEROOT.'app/core/seme_datatable.php');
require_once(SEMEROOT.'app/core/seme_viewmodel.php');


/**
* Define all general method for all tables
*   For class models
*
* @package Core\Model
* @since 1.0
*/
class JI_Model extends \SENE_Model
{
    /** @var string  */
    public $tbl;

    /** @var string  */
    public $tbl_as;

    /** @var array  */
    public $labels;

    /** @var array  */
    public $columns;

    /** @var array  */
    public $datatables;

    /** @var array  */
    public $point_of_view;

    /** @var string  */
    public $validation_message;

    /** @var \Seme_ViewModel  */
    public $viewmodel;

    public function __construct()
    {
        parent::__construct();
        $this->validation_message = '';
        $this->viewmodel = new Seme_ViewModel();
    }

    /**
     * Generates validation message
     *
     * @param  string  $validation_item               Validation item name
     *
     * @return mixed                     Current validation string or current class object
     */
    public function validation_message($validation_item='')
    {
        if (strlen($validation_item)) {
            if (strlen($this->validation_message) == 0) {
                $this->validation_message = 'Missing required column(s): ';
            }
            $this->validation_message .= $validation_item.', ';

            return $this;
        } else {
            return rtrim($this->validation_message, ', ');
        }

    }

    /**
     * Generates data for inserting into database table
     *
     * @return array generic array contains key as column name with the value
     */
    public function data_parameters()
    {
        $data_parameters = array();
        foreach ($this->columns as $key=>$val) {
            if (is_null($val->value)) {
                $val->value = 'null';
            }
            $data_parameters[$key] = $val->value;
        }
        return $data_parameters;
    }

    /**
     * Insert a row data
     *
     * @param  array   $d   Contain associative array that represent the pair of column and value
     * @return int          Return last ID if succeed, otherwise will return 0
     */
    public function set($d)
    {
        $this->db->insert($this->tbl, $d, 0, 0);
        return $this->db->last_id;
    }

    /**
     * Update a row data by supplied ID
     *
     * @param  int      $id    Positive integer
     * @return boolean         True if succeed, otherwise false
     */
    public function update($id, $d)
    {
        $this->db->where("id", $id);
        return $this->db->update($this->tbl, $d, 0);
    }

    /**
     * Delete row data by ID
     *
     * @param  int      $id    Positive integer
     * @return boolean         True if succeed, otherwise false
     */
    public function del($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete($this->tbl);
    }

    /**
     * Get single row data by ID
     *
     * @param  int      $id     Positive integer
     * @return stdClass         Will return single row object, otherwise will return empty object
     */
    public function id($id)
    {
        $this->db->where("id", $id);
        return $this->db->from($this->tbl, $this->tbl_as)->get_first('', 0);
    }

    /**
     * Open the database transaction session
     * @return boolean True if succeed, otherwise false
     */
    public function trans_start()
    {
        $r = $this->db->autocommit(0);
        if ($r) {
            return $this->db->begin();
        }
        return false;
    }

    /**
     * Execute `commit` SQL command
     * @return boolean True if succeed, otherwise false
     */
    public function trans_commit()
    {
        return $this->db->commit();
    }

    /**
     * Rollback the database transaction session
     * @return boolean True if succeed, otherwise false
     */
    public function trans_rollback()
    {
        return $this->db->rollback();
    }

    /**
     * Finalize the database transaction session
     * @return boolean True if succeed, otherwise false
     */
    public function trans_end()
    {
        return $this->db->autocommit(1);
    }

    /**
    * List all table columns
    *   If $key provided, it will show current key if exists
    *   Otherwise will produce stdClass / empty class
    *
    * @param string $key    key or name of column
    *
    * @return array         Current defined columns in array
    */
    public function columns($key='')
    {
        if (strlen($key) > 0) {
            if (isset($this->columns[$key])) {
                return $this->columns[$key];
            } else {
                return new stdClass();
            }
        }
        return $this->columns;
    }

    /**
    * Define columns into a table by using array of string
    *
    * @param array $key              array of string of column name
    * @param array $requireds        array of string of column name
    * @param array $default_values   array of string of column name
    *
    * @return array                  Current defined columns in array
    */
    public function define_columns($keys=array(), $requireds=array(), $default_values=array())
    {
        if (is_array($keys) && count($keys)) {
            foreach ($keys as $key) {
                $this->columns[$key] = new Seme_Column();
            }
        }
        $this->required_columns($requireds);
        $this->default_values($default_values);
        return $this->columns;
    }

    /**
    * Define a a required column into a table by a key / name of column
    *
    * @param string  $key        key or name of column
    * @param bool    $override   A boolean value for enforce or override current column required state
    *
    * @return array              Current defined columns in array
    */
    public function required_column($key='', $override=true)
    {
        if (is_string($key) && strlen($key) > 0) {
            if (!isset($this->columns[$key])) {
                $this->columns[$key] = new Seme_Column();
            }
            if ($override) {
                $this->columns[$key]->required = true;
            }
        }
        return $this->columns;
    }

    /**
    * Define a a required column into a table by a key / name of column
    *  by using array
    *
    * @param array  $key        Array of column names
    * @param bool   $override   A boolean value for enforce or override current column required state
    *
    * @return array             Current defined columns in array
    */
    public function required_columns($keys='', $override=true)
    {
        if (is_array($keys) && count($keys) > 0) {
            foreach($keys as $key) {
                $this->required_column($key, $override);
            }
        }

        return $this->columns;
    }

    /**
    * Define a column default value into a table by a key / name of column
    *
    * @param string  $column_name   key or name of column
    * @param mixed   $value         Current default value
    *
    * @return array                 Current defined columns in array
    */
    public function default_value($column_name='', $value='')
    {
        if (is_string($column_name) && strlen($column_name) > 0) {
            if (!isset($this->columns[$column_name])) {
                trigger_error('$column_name = '.$column_name.' undefined!');
                return;
            }
            $this->columns[$column_name]->default = $value;
        }
        return $this->columns;
    }

    /**
    * Define columns default value into a table by set of array values
    *   If supplied make sure the array length are equal with defined columns
    *
    * @param array   $column_name   key or name of column
    * @param mixed   $value         Current default value
    *
    * @return array                 Current defined columns in array
    */
    public function default_values($column_names=array())
    {
        if (!is_array($column_names)) {
            trigger_error('$column_names is not an array!');
            return;
        }

        $c = count($column_names);
        if ($c > 0) {
            if ($c != count($this->columns)) {
                trigger_error('$column_names array length not matched with defined columns!');
                return;
            }
            $i = 0;
            foreach($this->columns as $key=>$value) {
                $this->columns[$key]->default = isset($column_names[$i]) ? $column_names[$i] : '';
                $i++;
            }
        }

        return $this->columns;
    }

    public function defined_input($method='post')
    {
        switch(strtolower($method)){
            case 'get':
                $di = $_GET;
            case 'request':
                $di = $_REQUEST;
            default:
                $di = $_POST;
        }

        $defined_input = array();
        foreach($this->columns as $key=>$value){
            $defined_input[$key] = '';
            if (isset($defined_input[$key])) {
                $defined_input[$key] = $di[$key];
            }
        }

        return $defined_input;
    }

    /**
     * Validates the current input by method name
     *
     * @param  string   $method               Can be post, get, or request. Default: post
     *
     * @return boolean           True if valid, false if not valid
     */
    public function validates($method='post')
    {
        $result = true;
        switch(strtolower($method)){
            case 'get':
                $di = $_GET;
            case 'request':
                $di = $_REQUEST;
            default:
                $di = $_POST;
        }

        foreach($this->columns as $key=>$value){
            if ($value->required && !isset($di[$key])) {
                $result = false;
                $this->validation_message($key);
            } else if ($value->required && isset($di[$key]) && $value->is_enum()) {
                $result = $value->validate_enum($di[$key]);
                if (!$result) {
                    $this->validation_message($key);
                }
            } else if (!$value->required && !isset($di[$key])) {
                $this->columns[$key]->value = $this->columns[$key]->default;
            } else {
                $this->columns[$key]->value = $di[$key];
            }
        }
        return $result;
    }

    /**
     * Execute insert or update operation after run \JI_Model::validates method into particular table
     *
     * @return int Last inserted ID or 1 for edit operation, otherwise return 0
     */
    public function save($id=0)
    {
        if (is_int($id) && $id > 0) {
            return $this->update($id, $this->data_parameters());
        } else {
            $this->db->insert($this->tbl, $this->data_parameters(), 0, 0);
            return $this->db->last_id;
        }
    }

    /**
    * Global scoped procedure(s) for all of table when marked as deleted
    *
    * @return JI_Model this class
    */
    public function scoped()
    {
        $this->db->where_as("$this->tbl_as.is_deleted", $this->db->esc('0'));
        return $this;
    }

    /**
    * Global scoped procedure(s) for all of table when is active and not deleted
    *
    * @return JI_Model this class
    */
    public function active()
    {
        $this->db->where_as("$this->tbl_as.is_deleted", $this->db->esc('0'));
        $this->db->where_as("$this->tbl_as.is_active", $this->db->esc('1'));
        return $this;
    }

    /**
    * Get datatables support class from current $point_of_view
    *
    * @return Seme_Datatable if not exists will return empty Seme_Datatable object
    */
    public function datatable()
    {
        if (!isset($this->datatables[$this->point_of_view])) {
            $this->datatables[$this->point_of_view] = new Seme_Datatable();
        }
        return $this->datatables[$this->point_of_view];
    }

    /**
    * Get rendered HTML for labelled column
    *
    * @param string $column_name name of defined column label
    * @param mixed  $value       value for current defined column
    *
    * @return string formatted string label in html
    */
    public function label($column_name, $value){
        return $this->labels[$column_name]->html($value);
    }
}
