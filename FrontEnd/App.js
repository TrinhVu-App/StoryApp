import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import { Provider } from "react-redux";
import { NavigationContainer } from '@react-navigation/native';
import StoryDetail from './screens/StoryDetail';
import { store } from './store';
import StoryList from './screens/StoryList';
import SearchButton from './components/SearchButton';
import LevelFilter from './components/LevelFilter';
import LevelFilter2 from './components/LevelFilter2';
import StoryHome from './screens/StoryHome';
import ReadButton from './components/ReadButton';
import LibraryButton from './components/LibraryButton';
import StoryForYouButton from './components/StoriesForYouButton';
import LoginScreen from './screens/LoginScreen';

export default function App() {
  // const 
  // let stories = getStory().then(response => console.log(response)).catch(e => console.log(e));
  // console.log(stories)
  return (
 
    <Provider store={store}>
      <View style={styles.container}>
        <LoginScreen />
      </View>
    </Provider>
  


  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
});
