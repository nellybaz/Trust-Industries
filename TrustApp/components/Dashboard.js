import React from 'react';
import { StyleSheet,ScrollView,TouchableHighlight, AsyncStorage, Image, Text, View } from 'react-native';
import { VictoryBar, VictoryChart,  VictoryZoomContainer, VictoryTheme } from "victory-native";
import spinner from '../images/spinner.gif';


export default class Dashboard extends React.Component {

  constructor(props){
    super(props);

    this.state={
      user_id: '',
      foot_soldiers:[],
      isLoadData: true,
      data: [
        { product: 'BarSoap', cartons: 0, label:'0' },
      { product: 'Serviettes', cartons: 0, label:'0' },
      { product: 'Detergents', cartons: 0, label:'0' },
      ],
    }
  }


  updateData = (foot_soldier_name)=>{
    //alert('clicked')
    // const id = this.state.user_id;  
    // const soldier_name = foot_soldier_name;
    // let url = "http://trustindustries.rw/app/get_sales.php?id="+`${id}`+"&token=xxx12345trustapp67890zzz&foot_soldier_name="+`${soldier_name}`;

    // const response = fetch(url);
    // const json = response.json();
    // if(json != null){
    //   //console.log(json); 
      //const iid = AsyncStorage.getItem('user');
    //  console.log(json); 
    //  alert('recieved')   
    //  this.setState({
    //    data: json,
    //    //isLoadData_data:false,
    //  });
   // }
 
    // else{
    //  console.log(json);
    //  alert('failed to recieve')
    //  this.setState({
    //    data: [],
    //    //isLoadData: false,
    //  });
    // }


    var data = {
      "token": 'xxx12345trustapp67890zzz',
      "id": this.state.user_id,    
      "foot_soldier_name": foot_soldier_name,
   }

   fetch('http://trustindustries.rw/app/get_sales.php',{
            method: 'POST',
            mode: "same-origin",
            credentials: "same-origin",
            headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),

        })
        .then((response) => response.json())
        .then((responseJson) => {

          //alert(responseJson);
          if(responseJson != null){
            
           // convert json string to integer  
           for(var i = 0; i < responseJson.length; i++){
            responseJson[i].cartons = parseInt(responseJson[i].cartons);
        } 
        console.log(responseJson); 
            this.setState({
              data: responseJson,
              //isLoadData_data:false,
            });

           
          }
          else{
           
            alert('Error uploading data');
          }
        })
        .catch((error) => {
            alert(error);
          console.error(error);
        });
        

  }
 
  _loadFootSoldiers = async ()=>{
    //AsyncStorage.setItems('user', '2');
    try {
      const value1 = await AsyncStorage.getItem('user');
      if (value1 !== null){
        // We have data!!
        //console.log('id is ' + value1); 
        
        this.setState({
          user_id: value1,
        });
        
      }
    } catch (error) {
      // Error retrieving data
      console.log(error);
      
    }

    const id = this.state.user_id;  
   
   let url = "http://trustindustries.rw/app/foot_soldiers_display.php?id="+`${id}`+"&token=xxx12345trustapp67890zzz";

   const response = await fetch(url);
   const json = await response.json();
   if(json != null){
     //console.log(json); 
     //const iid = AsyncStorage.getItem('user');
    //console.log(json);    
    this.setState({
      foot_soldiers: json,
      isLoadData:false,
    });
   }

   else{
    //console.log(json);
    this.setState({
      foot_soldiers: [],
      //isLoadData: false,
    });
   }
   

 
  }


  componentDidMount(){
   this._loadFootSoldiers();
  }

  
  render() {


    


    return (
      <View style={styles.container}>


       <View style={styles.dashboard}>
       <VictoryChart
        height={300}  
        domain={{x: [0, 40], y:[0, 500]}}
        style={{marginLeft:10, }}
        containerComponent={<VictoryZoomContainer zoomDomain={{x: [0, 4]}}/>}    
        
      >
              <VictoryBar data={this.state.data} x="product" y="cartons"
              style={{ data: {fill: 'orange'}}}
              
              />

      </VictoryChart>

        </View>

        <ScrollView style={styles.scrollView} alignItems='center'>
            {this.state.isLoadData 
              && 
              <Image
                source={spinner}
                style={{height:50, width:50, alignSelf:'center'}}
            />
            }
               {this.state.foot_soldiers.map((soldier, i) => 
              (         
                <TouchableHighlight key={i}
                underlayColor="#CE93D8"
                onPress={()=> this.updateData(soldier.name)}
                style={styles.touchableHighlight}
              >
                <Text style={{fontSize:20}}>{soldier.name}</Text>
                </TouchableHighlight>
            
              )
    )}



        </ScrollView>

      </View>
    );
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',

  },

  touchableHighlight:{
    //flex:1,
    padding: 10,
    borderBottomWidth:0.5,
    marginTop:15,
    marginLeft:15,
    alignItems:'center',
    width:300,    
    marginRight:15,
    
  },
  scrollView:{
    flex:1,   

  },
  dashboard:{
    flex:1,
    //backgroundColor:'red',
    alignItems:'center',
  },
 
});
