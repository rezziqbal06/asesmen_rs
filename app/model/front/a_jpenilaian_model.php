<?php

namespace Model\Admin;

register_namespace(__NAMESPACE__);
/**
 * Scoped `front` model for `b_user` table
 *
 * @version 5.4.1
 *
 * @package Model\Front
 * @since 1.0.0
 */
class A_JPenilaian_Model extends \Model\A_JPenilaian_Concern
{


	public function __construct()
	{
		parent::__construct();
		$this->db->from($this->tbl, $this->tbl_as);
		$this->point_of_view = 'admin';
	}

	public function getAll($is_active = 1)
	{
		$this->db->select('id')->select('nama')->select('slug');
		$this->db->where('is_active', $is_active);
		return $this->db->get('', 0);
	}

	public function getBySlug($slug = '')
	{
		$this->db->select('id')->select('nama')->select('slug')->select('deskripsi');
		if (strlen($slug)) $this->db->where('slug', $slug);
		return $this->db->get_first('', 0);
	}
}
