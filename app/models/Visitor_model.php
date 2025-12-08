<?php
class Visitor_model {
    private $table = 'visitor';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function trackVisitor()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $query = "INSERT INTO " . $this->table . " (ip_address, waktu_akses) 
                  VALUES (:ip_address, NOW())
                  ON CONFLICT (ip_address) 
                  DO UPDATE SET waktu_akses = NOW();";
        $this->db->query($query);
        $this->db->bind('ip_address', $ip_address);
        $this->db->execute();
    }
    public function countOnlineUsers()
    {
        $this->db->query("SELECT COUNT(*) FROM " . $this->table . " WHERE waktu_akses > (NOW() - INTERVAL '10 minutes')");
        $result = $this->db->single();
        if (is_array($result) && !empty($result)) {
            return (int) array_values($result)[0];
        }
        return 0;
    }
    public function getVisitorStats()
    {
        $query = "SELECT 
                    TO_CHAR(waktu_akses, 'YYYY-MM') as month_year,
                    TO_CHAR(waktu_akses, 'Mon') as month_label,
                    COUNT(id) as total_visitors
                  FROM 
                    " . $this->table . "
                  WHERE 
                    waktu_akses >= NOW() - INTERVAL '12 months'
                  GROUP BY 
                    1, 2
                  ORDER BY 
                    month_year ASC";
        $this->db->query($query);
        $results = $this->db->resultSet();
        $labels = [];
        $data = [];
        $total = 0;
        for ($i = 11; $i >= 0; $i--) {
            $date = new DateTime("first day of -$i month");
            $labels[$date->format('Y-m')] = $date->format('M');
            $data[$date->format('Y-m')] = 0;
        }
        foreach ($results as $row) {
            $month_year = $row['month_year'];
            if (isset($data[$month_year])) {
                $data[$month_year] = (int)$row['total_visitors'];
            }
        }
        $total = array_sum($data);
        return [
            'labels' => array_values($labels),
            'data' => array_values($data),
            'total' => $total,
        ];
    }
}
