<?php

    /**
     * 创建MYsql数据库操作类
     */

     class DB {

        //构造函数，初始化
        function __construct($dbhost,$dbuser,$dbpwd,$dbname)
        {
            $this -> host = $dbhost;
            $this -> user = $dbuser;
            $this -> pwd = $dbpwd;
            $this -> dbname = $dbname;

            //执行数据库连接
            $this -> init();
        }

        //数据库连接
        function init(){

            //执行连接
           $this ->conn =  mysqli_connect($this->host,$this->user,$this->pwd,$this->dbname);

           // 编码
           mysqli_query($this->conn,"set NAMES utf8");
        }

        //执行语句(新增\修改\删除\查询)
        function execute($sql,$tag='i'){

            //获取结果记录集
           $this ->result[$tag] = mysqli_query($this->conn,$sql);
        }

        //执行查询时，每次从结果记录集中抓取一条记录
        function fetch($tag = 'i'){
            return mysqli_fetch_array($this ->result[$tag], MYSQLI_ASSOC);
        }

        //执行查询时，从结果记录集中抓取全部记录
        function fetchAll(){
            
            $tempArr = array();

            while($res = mysqli_fetch_array($this ->result)){
                $tempArr[] = $res;
            }

            return $tempArr;
        }

        //获取执行结果
        function aw(){
            return mysqli_affected_rows($this->conn);
        }

        //分页
        function pagination($sql,$pageRecords,$page=1){
            //初始化
            $pageHtml = '';

            //1.获取总记录数
            $result = mysqli_query($this->conn,$sql);
            $res = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $totalRecords = $res['total'];

            //2.每页显示的记录数
            $pageRecords = $pageRecords;

            //3.页码数 = 总记录数/每页显示的记录数
            $pageCounts = ceil($totalRecords/$pageRecords);

            //3.1输出数字页码数
            for($i=1;$i<=$pageCounts;$i++){
                $pageHtml .= '<a href="page.php?page='.$i.'">'.$i.'</a>';
            }
            
            //3.2上一页和下一页
            if ($page ==1){
                $prePage = 1;
            } else {
                $prePage = $page-1;
            }
            $prePageHtml = '<a href="page.php?page='.$prePage.'">上一页</a>';

            if ($page == $pageCounts){
                $nextPage = $pageCounts;
            } else {
                $nextPage = $page+1;
            }
            $nextPageHtml = '<a href="page.php?page='.$nextPage.'">下一页</a>';

            //返回页码
            return $prePageHtml.$pageHtml.$nextPageHtml;
        }

        //显示最近一次执行错误的信息
        function error(){

            echo mysqli_error($this->conn);

        }
     }

     //实例化对象
     $msql = new DB($dbhost,$dbuser,$dbpwd,$dbname);



?>