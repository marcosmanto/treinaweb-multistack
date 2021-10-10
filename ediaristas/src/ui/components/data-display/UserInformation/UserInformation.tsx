import React from 'react'
import {
  UserInformationContainer,
  UserName,
  UserDescription,
  AvatarStyled,
  RatingStyled,
} from './UserInformation.style'

interface UserIformationProps {
  picture: string
  name: string
  rating: number
  description?: string
}

const UserInformation: React.FC<UserIformationProps> = props => {
  return (
    <UserInformationContainer>
      <AvatarStyled src={props.picture}>{props.name[0]}</AvatarStyled>
      <UserName>{props.name}</UserName>
      <RatingStyled readOnly value={props.rating} />
      <UserDescription>{props.description}</UserDescription>
    </UserInformationContainer>
  )
}

export default UserInformation
